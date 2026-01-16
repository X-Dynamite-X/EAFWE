<?php

namespace App\Http\Controllers;

use App\Models\MarketingResource;
use Illuminate\Http\Request;

class MarketingResourceController extends Controller
{
    public function index()
    {
        $resources = MarketingResource::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('pages.dashboard.marketing.index', compact('resources'));
    }

    public function manage()
    {
        $resources = MarketingResource::orderBy('order')->get();

        return view('pages.dashboard.marketing.manage', compact('resources'));
    }

    public function create()
    {
        return view('pages.dashboard.marketing.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:marketing_resources,slug',
            'description' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,gif,webp|max:5120',
            'resource_type' => 'required|string|in:guide,template,case-study',
            'file' => 'nullable|file|max:10240',
            'is_active' => 'boolean',
            'order' => 'integer|min:0',
        ]);

        $data = $request->except('image', 'file');

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $path = $request->file('image')->store('marketing-resources', 'public');
            $data['image_url'] = '/storage/' . $path;
        }

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $path = $request->file('file')->store('marketing-files', 'public');
            $data['file_url'] = '/storage/' . $path;
        }

        MarketingResource::create($data);

        return redirect()->route('dashboard.marketing.manage')->with('success', 'تم إنشاء المورد بنجاح');
    }

    public function show(MarketingResource $resource)
    {
        return view('pages.dashboard.marketing.show', compact('resource'));
    }

    public function edit(MarketingResource $resource)
    {


        return view('pages.dashboard.marketing.edit', compact('resource'));
    }

    public function update(Request $request, MarketingResource $resource)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:marketing_resources,slug,' . $resource->id,
            'description' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,gif,webp|max:5120',
            'resource_type' => 'required|string|in:guide,template,case-study',
            'file' => 'nullable|file|max:10240',
            'is_active' => 'boolean',
            'order' => 'integer|min:0',
        ]);

        $data = $request->except('image', 'file');

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if ($resource->image_url && strpos($resource->image_url, '/storage/') !== false) {
                $oldPath = str_replace('/storage/', '', $resource->image_url);
                \Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('image')->store('marketing-resources', 'public');
            $data['image_url'] = '/storage/' . $path;
        }

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            if ($resource->file_url && strpos($resource->file_url, '/storage/') !== false) {
                $oldPath = str_replace('/storage/', '', $resource->file_url);
                \Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('file')->store('marketing-files', 'public');
            $data['file_url'] = '/storage/' . $path;
        }

        $resource->update($data);

        return redirect()->route('dashboard.marketing.manage')->with('success', 'تم تحديث المورد بنجاح');
    }

    public function destroy(MarketingResource $resource)
    {
        $resource->delete();

        return redirect()->route('dashboard.marketing.manage')->with('success', 'Marketing resource deleted successfully.');
    }
}
