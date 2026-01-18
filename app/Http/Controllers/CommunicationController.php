<?php

namespace App\Http\Controllers;

use App\Models\Communication;
use Illuminate\Http\Request;

class CommunicationController extends Controller
{
    public function index()
    {
        $communications = Communication::where('is_active', true)
            ->orderByRaw('is_pinned DESC')
            ->orderBy('order')
            ->get();

        return view('pages.dashboard.communication.index', compact('communications'));
    }

    public function manage()
    {
        $communications = Communication::orderByRaw('is_pinned DESC')
            ->orderBy('order')
            ->paginate(15);

        return view('pages.dashboard.communication.manage', compact('communications'));
    }

    public function create()
    {
        return view('pages.dashboard.communication.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:communications,slug',
            'message' => 'required|string',
            'type' => 'required|string|in:announcement,newsletter,notification',
            'published_date' => 'nullable|date',
            'is_active' => 'boolean',
            'is_pinned' => 'boolean',
            'order' => 'integer|min:0',
        ]);

        Communication::create($request->all());

        return redirect()->route('dashboard.communication.manage')->with('success', 'Communication created successfully.');
    }

    public function show(Communication $communication)
    {
        return view('pages.dashboard.communication.show', compact('communication'));
    }

    public function edit(Communication $communication)
    {
        return view('pages.dashboard.communication.edit', compact('communication'));
    }

    public function update(Request $request, Communication $communication)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:communications,slug,' . $communication->id,
            'message' => 'required|string',
            'type' => 'required|string|in:announcement,newsletter,notification',
            'published_date' => 'nullable|date',
            'is_active' => 'boolean',
            'is_pinned' => 'boolean',
            'order' => 'integer|min:0',
        ]);

        $communication->update($request->all());

        return redirect()->route('dashboard.communication.manage')->with('success', 'Communication updated successfully.');
    }

    public function destroy(Communication $communication)
    {
        $communication->delete();

        return redirect()->route('dashboard.communication.manage')->with('success', 'Communication deleted successfully.');
    }
}
