<?php

namespace App\Http\Controllers;

use App\Models\EntrepreneurshipProgram;
use Illuminate\Http\Request;

class EntrepreneurshipProgramController extends Controller
{
    public function index()
    {
        $programs = EntrepreneurshipProgram::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('pages.dashboard.entrepreneurship.index', compact('programs'));
    }

    public function manage()
    {
        $programs = EntrepreneurshipProgram::orderBy('order')->get();

        return view('pages.dashboard.entrepreneurship.manage', compact('programs'));
    }

    public function create()
    {
        return view('pages.dashboard.entrepreneurship.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:entrepreneurship_programs,slug',
            'description' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,gif,webp|max:5120',
            'type' => 'required|string|in:business,startup,mentorship',
            'is_active' => 'boolean',
            'order' => 'integer|min:0',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $path = $request->file('image')->store('entrepreneurship-programs', 'public');
            $data['image_url'] = '/storage/' . $path;
        }

        EntrepreneurshipProgram::create($data);

        return redirect()->route('dashboard.entrepreneurship.manage')->with('success', 'تم إنشاء البرنامج بنجاح');
    }

    public function show(EntrepreneurshipProgram $program)
    {
        return view('pages.dashboard.entrepreneurship.show', compact('program'));
    }

    public function edit(EntrepreneurshipProgram $program)
    {
        return view('pages.dashboard.entrepreneurship.edit', compact('program'));
    }

    public function update(Request $request, EntrepreneurshipProgram $program)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:entrepreneurship_programs,slug,' . $program->id,
            'description' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,gif,webp|max:5120',
            'type' => 'required|string|in:business,startup,mentorship',
            'is_active' => 'boolean',
            'order' => 'integer|min:0',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if ($program->image_url && strpos($program->image_url, '/storage/') !== false) {
                $oldPath = str_replace('/storage/', '', $program->image_url);
                \Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('image')->store('entrepreneurship-programs', 'public');
            $data['image_url'] = '/storage/' . $path;
        }

        $program->update($data);

        return redirect()->route('dashboard.entrepreneurship.manage')->with('success', 'تم تحديث البرنامج بنجاح');
    }

    public function destroy(EntrepreneurshipProgram $program)
    {
        $program->delete();

        return redirect()->route('dashboard.entrepreneurship.manage')->with('success', 'Entrepreneurship program deleted successfully.');
    }
}
