<?php

namespace App\Http\Controllers;

use App\Models\PortalOpportunity;
use Illuminate\Http\Request;

class PortalOpportunityController extends Controller
{
    public function index()
    {
        $opportunities = PortalOpportunity::where('is_active', true)
            ->where('status', '!=', 'closed')
            ->orderBy('order')
            ->get();

        return view('pages.dashboard.portal-opportunities.index', compact('opportunities'));
    }

    public function manage()
    {
        $opportunities = PortalOpportunity::orderBy('order')->get();

        return view('pages.dashboard.portal-opportunities.manage', compact('opportunities'));
    }

    public function create()
    {
        return view('pages.dashboard.portal-opportunities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:portal_opportunities,slug',
            'description' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,gif,webp|max:5120',
            'opportunity_type' => 'required|string|in:business,partnership,funding',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|string|in:active,closed,upcoming',
            'is_active' => 'boolean',
            'order' => 'integer|min:0',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $path = $request->file('image')->store('portal-opportunities', 'public');
            $data['image_url'] = '/storage/' . $path;
        }

        PortalOpportunity::create($data);

        return redirect()->route('dashboard.portal-opportunities.manage')->with('success', 'تم إنشاء الفرصة بنجاح');
    }

    public function show(PortalOpportunity $opportunity)
    {
        return view('pages.dashboard.portal-opportunities.show', compact('opportunity'));
    }

    public function edit(PortalOpportunity $opportunity)
    {
        return view('pages.dashboard.portal-opportunities.edit', compact('opportunity'));
    }

    public function update(Request $request, PortalOpportunity $opportunity)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:portal_opportunities,slug,' . $opportunity->id,
            'description' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,gif,webp|max:5120',
            'opportunity_type' => 'required|string|in:business,partnership,funding',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|string|in:active,closed,upcoming',
            'is_active' => 'boolean',
            'order' => 'integer|min:0',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if ($opportunity->image_url && strpos($opportunity->image_url, '/storage/') !== false) {
                $oldPath = str_replace('/storage/', '', $opportunity->image_url);
                \Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('image')->store('portal-opportunities', 'public');
            $data['image_url'] = '/storage/' . $path;
        }

        $opportunity->update($data);

        return redirect()->route('dashboard.portal.opportunities.manage')->with('success', 'تم تحديث الفرصة بنجاح');
    }

    public function destroy(PortalOpportunity $opportunity)
    {
        $opportunity->delete();

        return redirect()->route('portal-opportunities.manage')->with('success', 'Portal opportunity deleted successfully.');
    }
}
