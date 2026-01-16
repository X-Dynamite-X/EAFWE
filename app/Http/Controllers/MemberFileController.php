<?php

namespace App\Http\Controllers;

use App\Models\MemberFile;
use Illuminate\Http\Request;

class MemberFileController extends Controller
{
    public function index()
    {
        $files = MemberFile::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('pages.dashboard.files.index', compact('files'));
    }

    public function manage()
    {
        $files = MemberFile::orderBy('order')->get();

        return view('pages.dashboard.files.manage', compact('files'));
    }

    public function create()
    {
        return view('pages.dashboard.files.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:member_files,slug',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'file_type' => 'required|string|in:document,pdf,guide,template',
            'file' => 'nullable|file|max:10240', // 10MB max
            'file_size' => 'nullable|string',
            'category' => 'nullable|string',
            'is_active' => 'boolean',
            'order' => 'integer|min:0',
        ]);

        $data = $request->except('file');

        // Handle file upload
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $file = $request->file('file');
            $path = $file->store('member-files', 'public');
            $data['file_url'] = '/storage/' . $path;
            $data['file_size'] = $file->getSize();
        }

        MemberFile::create($data);

        return redirect()->route('dashboard.files.manage')->with('success', 'تم إنشاء الملف بنجاح');
    }

    public function show(MemberFile $file)
    {
        return view('pages.dashboard.files.show', compact('file'));
    }

    public function edit(MemberFile $file)
    {
        return view('pages.dashboard.files.edit', compact('file'));
    }

    public function update(Request $request, MemberFile $file)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:member_files,slug,' . $file->id,
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'file_type' => 'required|string|in:document,pdf,guide,template',
            'file' => 'nullable|file|max:10240', // 10MB max
            'file_size' => 'nullable|string',
            'category' => 'nullable|string',
            'is_active' => 'boolean',
            'order' => 'integer|min:0',
        ]);

        $data = $request->except('file');

        // Handle file upload
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            // Delete old file if exists
            if ($file->file_url && strpos($file->file_url, '/storage/') !== false) {
                $oldPath = str_replace('/storage/', '', $file->file_url);
                \Storage::disk('public')->delete($oldPath);
            }

            $uploadedFile = $request->file('file');
            $path = $uploadedFile->store('member-files', 'public');
            $data['file_url'] = '/storage/' . $path;
            $data['file_size'] = $uploadedFile->getSize();
        }

        $file->update($data);

        return redirect()->route('dashboard.files.manage')->with('success', 'تم تحديث الملف بنجاح');
    }

    public function destroy(MemberFile $file)
    {
        $file->delete();

        return redirect()->route('dashboard.files.manage')->with('success', 'Member file deleted successfully.');
    }
}
