<?php

namespace App\Http\Controllers;

use App\Models\TrainingProgram;
use App\Models\EntrepreneurshipProgram;
use App\Models\ParticipationOpportunity;
use App\Models\MarketingResource;
use App\Models\MemberFile;
use App\Models\Communication;
use App\Models\PortalOpportunity;
use Illuminate\Http\Request;

class MemberServiceController extends Controller
{
    public function training()
    {
        $programs = TrainingProgram::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('pages.dashboard.training.index', compact('programs'));
    }

    public function entrepreneurship()
    {
        $programs = EntrepreneurshipProgram::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('pages.dashboard.entrepreneurship.index', compact('programs'));
    }

    public function participationOpportunities()
    {
        $opportunities = ParticipationOpportunity::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('pages.dashboard.participation.index', compact('opportunities'));
    }

    public function marketing()
    {
        $resources = MarketingResource::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('pages.dashboard.marketing.index', compact('resources'));
    }

    public function files()
    {
        $files = MemberFile::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('pages.dashboard.files.index', compact('files'));
    }

    public function communication()
    {
        $communications = Communication::where('is_active', true)
            ->orderByRaw('is_pinned DESC')
            ->orderBy('order')
            ->get();

        return view('pages.dashboard.communication.index', compact('communications'));
    }

    public function portalOpportunities()
    {
        $opportunities = PortalOpportunity::where('is_active', true)
            ->where('status', '!=', 'closed')
            ->orderBy('order')
            ->get();

        return view('pages.dashboard.portal-opportunities.index', compact('opportunities'));
    }

    public function volunteering()
    {
        $opportunities = PortalOpportunity::where('is_active', true)
            ->where('opportunity_type', 'volunteer')
            ->where('status', '!=', 'closed')
            ->orderBy('order')
            ->get();

        return view('pages.dashboard.portal-opportunities.index', compact('opportunities'));
    }
}
