<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberServiceController extends Controller
{
    public function training()
    {
        return view('pages.dashboard.services.training');
    }

    public function entrepreneurship()
    {
        return view('pages.dashboard.services.entrepreneurship');
    }

    public function participationOpportunities()
    {
        return view('pages.dashboard.participation.opportunities');
    }

    public function marketing()
    {
        return view('pages.dashboard.marketing');
    }

    public function files()
    {
        return view('pages.dashboard.files');
    }

    public function communication()
    {
        return view('pages.dashboard.communication');
    }

    public function portalOpportunities()
    {
        return view('pages.dashboard.portal.opportunities');
    }

    public function volunteering()
    {
        return view('pages.dashboard.portal.volunteering');
    }
}
