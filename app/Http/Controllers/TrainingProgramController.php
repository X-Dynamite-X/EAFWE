<?php

namespace App\Http\Controllers;

use App\Models\TrainingProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrainingProgramController extends Controller
{
    public function index()
    {
        $programs = TrainingProgram::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('pages.dashboard.training.index', compact('programs'));
    }

    public function manage()
    {
        $programs = TrainingProgram::orderBy('order')->get();

        return view('pages.dashboard.training.manage', compact('programs'));
    }

    public function create()
    {
        return view('pages.dashboard.training.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'slug' => 'required|string|unique:training_programs,slug',
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'content_en' => 'required|string',
            'content_ar' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,gif,webp|max:5120',
            'category' => 'required|string|in:training,workshop,seminar',
            'is_active' => 'boolean',
            'order' => 'integer|min:0',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $path = $request->file('image')->store('training-programs', 'public');
            $data['image_url'] = '/storage/' . $path;
        }

        TrainingProgram::create($data);

        return redirect()->route('dashboard.training.manage')->with('success', 'تم إنشاء البرنامج بنجاح');
    }

    public function show(TrainingProgram $program)
    {
        return view('pages.dashboard.training.show', compact('program'));
    }

    public function edit(TrainingProgram $program)
    {
        return view('pages.dashboard.training.edit', compact('program'));
    }

    public function update(Request $request, TrainingProgram $program)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'slug' => 'required|string|unique:training_programs,slug,' . $program->id,
            'description_en' => 'required|string',
            'description_ar' => 'required|string',
            'content_en' => 'required|string',
            'content_ar' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,gif,webp|max:5120',
            'category' => 'required|string|in:training,workshop,seminar',
            'is_active' => 'boolean',
            'order' => 'integer|min:0',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if ($program->image_url && strpos($program->image_url, '/storage/') !== false) {
                $oldPath = str_replace('/storage/', '', $program->image_url);
                \Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('image')->store('training-programs', 'public');
            $data['image_url'] = '/storage/' . $path;
        }

        $program->update($data);

        return redirect()->route('dashboard.training.manage')->with('success', 'تم تحديث البرنامج بنجاح');
    }

    public function destroy(TrainingProgram $program)
    {
        $program->delete();

        return redirect()->route('dashboard.training.manage')->with('success', 'Training program deleted successfully.');
    }
}
