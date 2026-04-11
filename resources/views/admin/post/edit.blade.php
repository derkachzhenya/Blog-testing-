<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Edit Post') }}
            </h2>

            <div class="hidden items-center gap-2 text-sm text-gray-400 md:flex">
                <a class="font-medium text-sky-600 transition hover:text-sky-700" href="{{ route('dashboard') }}">
                    Dashboard
                </a>
                <span>/</span>
                <a class="font-medium text-sky-600 transition hover:text-sky-700" href="{{ route('post.index') }}">
                    Posts
                </a>
                <span>/</span>
                <span>Edit</span>
            </div>
        </div>
    </x-slot>

    @php
        $selectedTags = old('tags', $post->tags->pluck('id')->map(fn ($id) => (string) $id)->all());
    @endphp

    <div class="bg-gray-100 py-8">
        <div class="mx-auto flex max-w-7xl flex-col gap-6 px-4 sm:px-6 lg:flex-row lg:px-8" x-data="{ sidebarOpen: true }">
            <aside
                :class="sidebarOpen ? 'lg:w-64' : 'lg:w-20'"
                class="hidden shrink-0 rounded-[2rem] bg-slate-800 p-4 text-white shadow-xl transition-all duration-300 lg:flex lg:min-h-[32rem] lg:flex-col"
            >
                <div class="flex items-center gap-3 rounded-2xl border border-white/10 bg-white/5 p-3">
                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-white/10 text-lg font-semibold">
                        P
                    </div>

                    <div class="overflow-hidden transition-opacity duration-200" x-show="sidebarOpen">
                        <p class="text-sm font-semibold">Post Admin</p>
                        <p class="text-xs text-slate-400">Content posts</p>
                    </div>
                </div>

                <nav class="mt-6 space-y-2">
                    <a
                        class="flex items-center gap-3 rounded-2xl px-3 py-3 text-sm font-medium text-slate-300 transition hover:bg-white/10 hover:text-white"
                        href="{{ route('dashboard') }}"
                    >
                        <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path d="M3 12.75L12 4l9 8.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M5.25 10.5v8.25a1.5 1.5 0 001.5 1.5h3.75v-5.25h3v5.25h3.75a1.5 1.5 0 001.5-1.5V10.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span x-show="sidebarOpen">Dashboard</span>
                    </a>

                    <a
                        class="flex items-center gap-3 rounded-2xl bg-sky-500/20 px-3 py-3 text-sm font-medium text-white transition hover:bg-sky-500/30"
                        href="{{ route('post.index') }}"
                    >
                        <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path d="M7.5 6.75h9" stroke-linecap="round" />
                            <path d="M7.5 12h9" stroke-linecap="round" />
                            <path d="M7.5 17.25h5.25" stroke-linecap="round" />
                            <path d="M5.25 4.5h13.5A1.5 1.5 0 0120.25 6v12a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V6a1.5 1.5 0 011.5-1.5z" stroke-linejoin="round" />
                        </svg>
                        <span x-show="sidebarOpen">Posts</span>
                    </a>
                </nav>
            </aside>

            <section class="flex-1 space-y-6">
                <div class="rounded-[2rem] bg-white p-4 shadow-sm ring-1 ring-gray-200/80 sm:p-5">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div class="flex items-center gap-3">
                            <button
                                @click="sidebarOpen = ! sidebarOpen"
                                aria-label="Toggle sidebar"
                                class="inline-flex h-11 w-11 items-center justify-center rounded-2xl border border-gray-200 text-gray-500 transition hover:bg-gray-50 hover:text-gray-700"
                                type="button"
                            >
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                    <path d="M4.5 7.5h15" stroke-linecap="round" />
                                    <path d="M4.5 12h15" stroke-linecap="round" />
                                    <path d="M4.5 16.5h15" stroke-linecap="round" />
                                </svg>
                            </button>

                            <div>
                                <p class="text-lg font-semibold text-gray-900">Edit post</p>
                                <p class="text-sm text-gray-500">Update the content and taxonomy for this post.</p>
                            </div>
                        </div>

                        <a
                            class="inline-flex items-center justify-center gap-2 rounded-2xl border border-gray-200 px-5 py-3 text-sm font-medium text-gray-600 transition hover:bg-gray-50 hover:text-gray-900"
                            href="{{ route('post.index') }}"
                        >
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M15 18l-6-6 6-6" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span>Back to posts</span>
                        </a>
                    </div>
                </div>

                <div class="grid gap-6 xl:grid-cols-[minmax(0,1fr)_20rem]">
                    <div class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-gray-200/80 sm:p-8">
                        <div class="border-b border-gray-100 pb-5">
                            <h3 class="text-lg font-semibold text-gray-900">Edit details</h3>
                            <p class="mt-2 max-w-2xl text-sm text-gray-500">
                                Change the post title, content, category, and tags.
                            </p>
                        </div>

                        @if ($errors->any())
                            <div class="mt-6 rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                                Please correct the highlighted fields and try again.
                            </div>
                        @endif

                        <form action="{{ route('post.update', $post) }}" class="mt-6 space-y-6" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="space-y-2">
                                <x-input-label for="title" value="Post title" />
                                <x-text-input
                                    id="title"
                                    name="title"
                                    type="text"
                                    class="block w-full rounded-2xl border-gray-200 px-4 py-3 text-sm shadow-none focus:border-sky-500 focus:ring-sky-500"
                                    :value="old('title', $post->title)"
                                    placeholder="For example: Laravel CRUD basics"
                                    required
                                    autofocus
                                />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>

                            <div class="space-y-2">
                                <x-input-label for="content" value="Post content" />
                                <textarea
                                    id="content"
                                    name="content"
                                    class="block min-h-48 w-full rounded-2xl border-gray-200 px-4 py-3 text-sm shadow-none focus:border-sky-500 focus:ring-sky-500"
                                    placeholder="Write the post body here..."
                                    required
                                >{{ old('content', $post->content) }}</textarea>
                                <x-input-error :messages="$errors->get('content')" class="mt-2" />
                            </div>

                            <div class="grid gap-6 lg:grid-cols-2">
                                <div class="space-y-2">
                                    <x-input-label for="category_id" value="Category" />
                                    <select
                                        id="category_id"
                                        name="category_id"
                                        class="block w-full rounded-2xl border-gray-200 px-4 py-3 text-sm shadow-none focus:border-sky-500 focus:ring-sky-500"
                                    >
                                        <option value="">No category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @selected((string) old('category_id', $post->category_id) === (string) $category->id)>
                                                {{ $category->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                                </div>

                                <div class="space-y-2">
                                    <x-input-label for="tags" value="Tags" />
                                    <select
                                        id="tags"
                                        name="tags[]"
                                        class="block w-full rounded-2xl border-gray-200 px-4 py-3 text-sm shadow-none focus:border-sky-500 focus:ring-sky-500"
                                        multiple
                                        size="6"
                                    >
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}" @selected(in_array((string) $tag->id, $selectedTags, true))>
                                                {{ $tag->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <p class="text-sm text-gray-500">Hold Cmd or Ctrl to select multiple tags.</p>
                                    <x-input-error :messages="$errors->get('tags')" class="mt-2" />
                                    <x-input-error :messages="$errors->get('tags.*')" class="mt-2" />
                                </div>
                            </div>

                            <div class="flex flex-col gap-3 border-t border-gray-100 pt-6 sm:flex-row sm:items-center sm:justify-between">
                                <p class="text-sm text-gray-500">
                                    Changes will be applied as soon as you save.
                                </p>

                                <div class="flex flex-col gap-3 sm:flex-row">
                                    <a
                                        class="inline-flex items-center justify-center rounded-2xl border border-gray-200 px-5 py-3 text-sm font-medium text-gray-600 transition hover:bg-gray-50 hover:text-gray-900"
                                        href="{{ route('post.index') }}"
                                    >
                                        Cancel
                                    </a>
                                    <button
                                        class="inline-flex items-center justify-center gap-2 rounded-2xl bg-amber-500 px-5 py-3 text-sm font-medium text-white transition hover:bg-amber-600"
                                        type="submit"
                                    >
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path d="M16.862 4.487a2.25 2.25 0 113.182 3.182L8.25 19.463 3.75 20.25l.788-4.5L16.862 4.487z" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <span>Save changes</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <aside class="rounded-[2rem] bg-slate-900 p-6 text-white shadow-sm sm:p-7">
                        <p class="text-xs uppercase tracking-[0.3em] text-amber-300">Current value</p>
                        <h3 class="mt-4 text-xl font-semibold">{{ $post->title }}</h3>
                        <p class="mt-3 text-sm leading-6 text-slate-300">
                            Update this post if its title, body, category, or tags should appear differently in the admin panel.
                        </p>

                        <div class="mt-6 space-y-3 rounded-[1.5rem] border border-white/10 bg-white/5 p-4">
                            <div class="rounded-2xl bg-white/10 px-4 py-3">
                                <p class="text-xs uppercase tracking-[0.2em] text-slate-400">Category</p>
                                <p class="mt-2 text-sm font-medium text-white">{{ $post->category?->title ?? 'No category' }}</p>
                            </div>

                            <div class="rounded-2xl bg-white/10 px-4 py-3">
                                <p class="text-xs uppercase tracking-[0.2em] text-slate-400">Created at</p>
                                <p class="mt-2 text-sm font-medium text-white">{{ $post->created_at?->format('d.m.Y H:i') }}</p>
                            </div>
                        </div>
                    </aside>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
