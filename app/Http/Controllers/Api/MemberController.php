<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

/**
 * API Member Controller
 * Handles member profile, membership card, and dashboard operations
 */
class MemberController extends Controller
{
    /**
     * Get member profile
     */
    public function getProfile(Request $request): JsonResponse
    {
        $user = $request->user();
        $membership = $user->memberships()
            ->where('status', 'approved')
            ->latest('approval_date')
            ->first();

        return response()->json([
            'data' => [
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                ],
                'membership' => $membership ? [
                    'id' => $membership->id,
                    'membership_type' => $membership->membership_type,
                    'country' => $membership->country,
                    'company_name' => $membership->company_name,
                    'status' => $membership->status,
                    'approval_date' => $membership->approval_date?->format('Y-m-d'),
                    'card_issued_at' => $membership->card_issued_at?->format('Y-m-d H:i:s'),
                    'card_verified' => $membership->card_verified,
                ] : null,
            ],
        ]);
    }

    /**
     * Update member profile
     */
    public function updateProfile(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'phone' => 'nullable|string|max:20',
            ]);

            $user = $request->user();
            $user->update($validated);

            return response()->json([
                'message' => 'Profile updated successfully',
                'data' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                ],
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);
        }
    }

    /**
     * Get dashboard statistics
     */
    public function getDashboard(Request $request): JsonResponse
    {
        $user = $request->user();
        $membership = $user->memberships()
            ->where('status', 'approved')
            ->latest('approval_date')
            ->first();

        return response()->json([
            'data' => [
                'user' => [
                    'name' => $user->name,
                    'email' => $user->email,
                ],
                'membership' => $membership ? [
                    'type' => $membership->membership_type,
                    'status' => $membership->status,
                    'approval_date' => $membership->approval_date?->format('Y-m-d'),
                ] : null,
                'statistics' => [
                    'total_memberships' => $user->memberships()->count(),
                    'approved_memberships' => $user->memberships()->where('status', 'approved')->count(),
                    'pending_memberships' => $user->memberships()->where('status', 'pending')->count(),
                ],
            ],
        ]);
    }

    /**
     * Get membership card data
     */
    public function getCard(Request $request): JsonResponse
    {
        $user = $request->user();
        $membership = $user->memberships()
            ->where('status', 'approved')
            ->latest('approval_date')
            ->first();

        if (! $membership) {
            return response()->json([
                'message' => 'No approved membership found',
            ], 404);
        }

        // Create token if not exists
        if (! $membership->card_token) {
            $membership->card_token = Str::random(32).'-'.time();
            $membership->card_issued_at = now();
            $membership->save();
        }

        return response()->json([
            'data' => [
                'membership' => [
                    'id' => $membership->id,
                    'membership_type' => $membership->membership_type,
                    'country' => $membership->country,
                    'company_name' => $membership->company_name,
                    'approval_date' => $membership->approval_date?->format('Y-m-d'),
                ],
                'user' => [
                    'name' => $user->name,
                    'email' => $user->email,
                ],
                'card' => [
                    'token' => $membership->card_token,
                    'issued_at' => $membership->card_issued_at?->format('Y-m-d H:i:s'),
                    'verified' => $membership->card_verified,
                    'qr_url' => route('member-card.verify', $membership->card_token),
                ],
            ],
        ]);
    }

    /**
     * Get QR code for membership card
     */
    public function getQrCode(Request $request): JsonResponse
    {
        $user = $request->user();
        $membership = $user->memberships()
            ->where('status', 'approved')
            ->latest('approval_date')
            ->first();

        if (! $membership) {
            return response()->json([
                'message' => 'No approved membership found',
            ], 404);
        }

        // Create token if not exists
        if (! $membership->card_token) {
            $membership->card_token = Str::random(32).'-'.time();
            $membership->card_issued_at = now();
            $membership->save();
        }

        // Generate QR code as base64
        $qrCodePng = QrCode::format('png')
            ->size(300)
            ->errorCorrection('H')
            ->generate(route('member-card.verify', $membership->card_token));

        $qrCodeBase64 = 'data:image/png;base64,'.base64_encode($qrCodePng);

        return response()->json([
            'data' => [
                'qr_code' => $qrCodeBase64,
                'qr_url' => route('member-card.verify', $membership->card_token),
            ],
        ]);
    }

    /**
     * Reissue membership card (generate new token)
     */
    public function reissueCard(Request $request): JsonResponse
    {
        $user = $request->user();
        $membership = $user->memberships()
            ->where('status', 'approved')
            ->latest('approval_date')
            ->first();

        if (! $membership) {
            return response()->json([
                'message' => 'No approved membership found',
            ], 404);
        }

        // Generate new token
        $membership->update([
            'card_token' => Str::random(32).'-'.time(),
            'card_issued_at' => now(),
            'card_verified' => false,
        ]);

        return response()->json([
            'message' => 'Card reissued successfully',
            'data' => [
                'card' => [
                    'token' => $membership->card_token,
                    'issued_at' => $membership->card_issued_at->format('Y-m-d H:i:s'),
                    'verified' => $membership->card_verified,
                ],
            ],
        ]);
    }

    /**
     * Download membership card as PDF
     */
    public function downloadCard(Request $request): JsonResponse
    {
        $user = $request->user();
        $membership = $user->memberships()
            ->where('status', 'approved')
            ->latest('approval_date')
            ->first();

        if (! $membership) {
            return response()->json([
                'message' => 'No approved membership found',
            ], 404);
        }

        // Create token if not exists
        if (! $membership->card_token) {
            $membership->card_token = Str::random(32).'-'.time();
            $membership->card_issued_at = now();
            $membership->save();
        }

        // Return download URL (client can download via web route)
        $downloadUrl = route('member-card.download', [
            'membership' => $membership->id,
            'locale' => $request->input('locale', 'ar'),
        ]);

        return response()->json([
            'data' => [
                'download_url' => $downloadUrl,
            ],
        ]);
    }

    /**
     * Verify membership token (public endpoint)
     */
    public function verifyToken(string $cardToken): JsonResponse
    {
        $membership = Membership::query()->where('card_token', $cardToken)
            ->with('user')
            ->first();

        if (! $membership) {
            return response()->json([
                'valid' => false,
                'message' => 'Invalid membership token',
            ], 404);
        }

        if ($membership->status !== 'approved') {
            return response()->json([
                'valid' => false,
                'message' => 'Membership not approved',
            ], 403);
        }

        // Update verification status
        $membership->update(['card_verified' => true]);

        // Log verification
        Log::info('Card verification via API', [
            'membership_id' => $membership->id,
            'user_id' => $membership->user_id,
            'verified_at' => now(),
        ]);

        return response()->json([
            'valid' => true,
            'data' => [
                'member' => [
                    'id' => $membership->user_id,
                    'name' => $membership->user->name,
                    'email' => $membership->user->email,
                    'membership_type' => $membership->membership_type,
                    'country' => $membership->country,
                    'company_name' => $membership->company_name,
                    'approval_date' => $membership->approval_date->format('Y-m-d'),
                    'status' => $membership->status,
                ],
            ],
        ]);
    }
}
