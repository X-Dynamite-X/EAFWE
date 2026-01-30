<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TrainingProgram;
use App\Models\EntrepreneurshipProgram;
use App\Models\ParticipationOpportunity;
use App\Models\MarketingResource;
use App\Models\MemberFile;
use App\Models\Communication;
use App\Models\PortalOpportunity;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiServiceController extends Controller
{
    /**
     * Get training programs
     */
    public function training(): JsonResponse
    {
        $programs = TrainingProgram::where('is_active', true)
            ->orderBy('order')
            ->get();

        return response()->json([
            'data' => $programs
        ]);
    }

    /**
     * Get entrepreneurship programs
     */
    public function entrepreneurship(): JsonResponse
    {
        $programs = EntrepreneurshipProgram::where('is_active', true)
            ->orderBy('order')
            ->get();

        return response()->json([
            'data' => $programs
        ]);
    }

    /**
     * Get participation opportunities
     */
    public function participationOpportunities(): JsonResponse
    {
        $opportunities = ParticipationOpportunity::where('is_active', true)
            ->orderBy('order')
            ->get();

        return response()->json([
            'data' => $opportunities
        ]);
    }

    /**
     * Get marketing resources
     */
    public function marketing(): JsonResponse
    {
        $resources = MarketingResource::where('is_active', true)
            ->orderBy('order')
            ->get();

        return response()->json([
            'data' => $resources
        ]);
    }

    /**
     * Get member files
     */
    public function files(): JsonResponse
    {
        $files = MemberFile::where('is_active', true)
            ->orderBy('order')
            ->get();

        return response()->json([
            'data' => $files
        ]);
    }

    /**
     * Get communications
     */
    public function communication(): JsonResponse
    {
        $communications = Communication::where('is_active', true)
            ->orderByRaw('is_pinned DESC')
            ->orderBy('order')
            ->get();

        return response()->json([
            'data' => $communications
        ]);
    }

    /**
     * Get portal opportunities
     */
    public function portalOpportunities(): JsonResponse
    {
        $opportunities = PortalOpportunity::where('is_active', true)
            ->where('status', '!=', 'closed')
            ->orderBy('order')
            ->get();

        return response()->json([
            'data' => $opportunities
        ]);
    }
}
