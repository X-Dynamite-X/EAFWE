<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('pages.dashboard.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('pages.dashboard.pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'required|string|unique:pages,slug',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Page::create($request->all());

        return redirect()->route('dashboard.pages.index')->with('success', 'Page created successfully.');
    }

    public function show($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('pages.dashboard.pages.show', compact('page'));
    }

    public function edit(Page $page)
    {
        return view('pages.dashboard.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'slug' => 'required|string|unique:pages,slug,' . $page->id,
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $page->update($request->all());

        return redirect()->route('dashboard.pages.index')->with('success', 'Page updated successfully.');
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->route('dashboard.pages.index')->with('success', 'Page deleted successfully.');
    }
}
