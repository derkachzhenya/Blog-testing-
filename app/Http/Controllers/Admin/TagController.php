<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagRequest;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TagController extends Controller
{
    public function index(): View
    {
        $tags = Tag::query()->latest()->get();

        return view('admin.tag.index', compact('tags'));
    }

    public function create(): View
    {
        return view('admin.tag.create');
    }

    public function store(StoreTagRequest $request): RedirectResponse
    {
        Tag::create($request->validated());

        return redirect()
            ->route('tag.index')
            ->with('status', 'Tag created successfully.');
    }

    public function show(Tag $tag): View
    {
        return view('admin.tag.show', compact('tag'));
    }

    public function edit(Tag $tag): View
    {
        return view('admin.tag.edit', compact('tag'));
    }

    public function update(StoreTagRequest $request, Tag $tag): RedirectResponse
    {
        $tag->update($request->validated());

        return redirect()
            ->route('tag.index')
            ->with('status', 'Tag updated successfully.');
    }

    public function destroy(Tag $tag): RedirectResponse
    {
        $tag->delete();

        return redirect()
            ->route('tag.index')
            ->with('status', 'Tag deleted successfully.');
    }
}
