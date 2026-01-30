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
            ->get()
            ->map(fn($program) => [
                'id' => $program->id,
                'title_ar' => $program->title['ar'] ?? 'Unknown',
                'title_en' => $program->title['en'] ?? 'Unknown',
                'description_ar' => $program->description['ar'] ?? null,
                'description_en' => $program->description['en'] ?? null,
                'image_url' => $program->image_url,
                'link' => route('training-programs.show', $program->slug),
            ]);

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
            ->get()
            ->map(fn($program) => [
                'id' => $program->id,
                'title_ar' => $program->title['ar'] ?? 'Unknown',
                'title_en' => $program->title['en'] ?? 'Unknown',
                'description_ar' => $program->description['ar'] ?? null,
                'description_en' => $program->description['en'] ?? null,
                'image_url' => $program->image_url,
            ]);

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
            ->get()
            ->map(fn($opp) => [
                'id' => $opp->id,
                'title_ar' => $opp->title['ar'] ?? 'Unknown',
                'title_en' => $opp->title['en'] ?? 'Unknown',
                'description_ar' => $opp->description['ar'] ?? null,
                'description_en' => $opp->description['en'] ?? null,
                'image_url' => $opp->image_url,
            ]);

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
            ->get()
            ->map(fn($resource) => [
                'id' => $resource->id,
                'title_ar' => $resource->title['ar'] ?? 'Unknown',
                'title_en' => $resource->title['en'] ?? 'Unknown',
                'description_ar' => $resource->description['ar'] ?? null,
                'description_en' => $resource->description['en'] ?? null,
                'file_url' => $resource->file_url,
            ]);

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
            ->get()
            ->map(fn($file) => [
                'id' => $file->id,
                'title_ar' => $file->title_ar ?? 'Unknown',
                'title_en' => $file->title_en ?? 'Unknown',
                'file_url' => $file->file_url,
                'file_type' => $file->file_type,
            ]);

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
            ->get()
            ->map(fn($comm) => [
                'id' => $comm->id,
                'subject_ar' => $comm->title['ar'] ?? 'Unknown',
                'subject_en' => $comm->title['en'] ?? 'Unknown',
                'content_ar' => $comm->message['ar'] ?? '',
                'content_en' => $comm->message['en'] ?? '',
                'is_pinned' => $comm->is_pinned ? 1 : 0,
                'created_at' => $comm->created_at->toIso8601String(),
            ]);

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
            ->get()
            ->map(fn($opp) => [
                'id' => $opp->id,
                'title_ar' => $opp->title['ar'] ?? 'Unknown',
                'title_en' => $opp->title['en'] ?? 'Unknown',
                'description_ar' => $opp->description['ar'] ?? null,
                'description_en' => $opp->description['en'] ?? null,
                'image_url' => $opp->image_url,
            ]);

        return response()->json([
            'data' => $opportunities
        ]);
    }
}
