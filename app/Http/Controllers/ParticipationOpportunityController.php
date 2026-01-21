<?php

namespace App\Http\Controllers;

use App\Models\ParticipationOpportunity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ParticipationOpportunityController extends Controller
{
    public function index()
    {
        $opportunities = ParticipationOpportunity::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('pages.dashboard.participation.index', compact('opportunities'));
    }

    public function manage()
    {
        $opportunities = ParticipationOpportunity::orderBy('order')->get();

        return view('pages.dashboard.participation.manage', compact('opportunities'));
    }

    public function create()
    {
        return view('pages.dashboard.participation.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'slug' => 'required|string|unique:participation_opportunities,slug',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'content_en' => 'required|string',
            'content_ar' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,gif,webp|max:5120',
            'type' => 'required|string|in:volunteer,partner,sponsor',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_active' => 'boolean',
            'order' => 'integer|min:0',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $path = $request->file('image')->store('participation-opportunities', 'public');
            $data['image_url'] = '/storage/' . $path;
        }

        ParticipationOpportunity::create($data);

        return redirect()->route('dashboard.participation.manage')->with('success', 'تم إنشاء الفرصة بنجاح');
    }

    public function show(ParticipationOpportunity $opportunity)
    {
        return view('pages.dashboard.participation.show', compact('opportunity'));
    }

    public function edit(ParticipationOpportunity $opportunity)
    {
        return view('pages.dashboard.participation.edit', compact('opportunity'));
    }

    public function update(Request $request, ParticipationOpportunity $opportunity)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'slug' => 'required|string|unique:participation_opportunities,slug,' . $opportunity->id,
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'content_en' => 'required|string',
            'content_ar' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,gif,webp|max:5120',
            'type' => 'required|string|in:volunteer,partner,sponsor',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_active' => 'boolean',
            'order' => 'integer|min:0',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if ($opportunity->image_url && strpos($opportunity->image_url, '/storage/') !== false) {
                $oldPath = str_replace('/storage/', '', $opportunity->image_url);
                \Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('image')->store('participation-opportunities', 'public');
            $data['image_url'] = '/storage/' . $path;
        }

        $opportunity->update($data);

        return redirect()->route('dashboard.participation.manage')->with('success', 'تم تحديث الفرصة بنجاح');
    }

    public function destroy(ParticipationOpportunity $opportunity)
    {
        $opportunity->delete();

        return redirect()->route('dashboard.participation.manage')->with('success', 'Participation opportunity deleted successfully.');
    }
}
