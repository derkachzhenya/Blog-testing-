<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::query()
            ->with(['category', 'tags'])
            ->latest()
            ->get();

        return view('admin.post.index', compact('posts'));
    }

    public function create(): View
    {
        $categories = Category::query()->orderBy('title')->get();
        $tags = Tag::query()->orderBy('title')->get();

        return view('admin.post.create', compact('categories', 'tags'));
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $tagIds = $validated['tags'] ?? [];

        unset($validated['tags']);

        $post = Post::query()->create($validated);
        $post->tags()->sync($tagIds);

        return redirect()
            ->route('post.index')
            ->with('status', 'Post created successfully.');
    }

    public function show(Post $post): View
    {
        $post->load(['category', 'tags']);

        return view('admin.post.show', compact('post'));
    }

    public function edit(Post $post): View
    {
        $post->load(['category', 'tags']);

        $categories = Category::query()->orderBy('title')->get();
        $tags = Tag::query()->orderBy('title')->get();

        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(StorePostRequest $request, Post $post): RedirectResponse
    {
        $validated = $request->validated();
        $tagIds = $validated['tags'] ?? [];

        unset($validated['tags']);

        $post->update($validated);
        $post->tags()->sync($tagIds);

        return redirect()
            ->route('post.index')
            ->with('status', 'Post updated successfully.');
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()
            ->route('post.index')
            ->with('status', 'Post deleted successfully.');
    }
}
