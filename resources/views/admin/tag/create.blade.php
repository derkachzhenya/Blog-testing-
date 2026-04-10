<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Create Tag') }}
            </h2>

            <div class="hidden items-center gap-2 text-sm text-gray-400 md:flex">
                <a class="font-medium text-sky-600 transition hover:text-sky-700" href="{{ route('dashboard') }}">
                    Dashboard
                </a>
                <span>/</span>
                <a class="font-medium text-sky-600 transition hover:text-sky-700" href="{{ route('tag.index') }}">
                    Tags
                </a>
                <span>/</span>
                <span>Create</span>
            </div>
        </div>
    </x-slot>

    <div class="bg-gray-100 py-8">
        <div class="mx-auto flex max-w-7xl flex-col gap-6 px-4 sm:px-6 lg:flex-row lg:px-8" x-data="{ sidebarOpen: true }">
            <aside
                :class="sidebarOpen ? 'lg:w-64' : 'lg:w-20'"
                class="hidden shrink-0 rounded-[2rem] bg-slate-800 p-4 text-white shadow-xl transition-all duration-300 lg:flex lg:min-h-[32rem] lg:flex-col"
            >
                <div class="flex items-center gap-3 rounded-2xl border border-white/10 bg-white/5 p-3">
                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-white/10 text-lg font-semibold">
                        T
                    </div>

                    <div class="overflow-hidden transition-opacity duration-200" x-show="sidebarOpen">
                        <p class="text-sm font-semibold">Tag Admin</p>
                        <p class="text-xs text-slate-400">Content tags</p>
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
                        href="{{ route('tag.index') }}"
                    >
                        <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path d="M7.5 6.75h9" stroke-linecap="round" />
                            <path d="M7.5 12h9" stroke-linecap="round" />
                            <path d="M7.5 17.25h5.25" stroke-linecap="round" />
                            <path d="M5.25 4.5h13.5A1.5 1.5 0 0120.25 6v12a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V6a1.5 1.5 0 011.5-1.5z" stroke-linejoin="round" />
                        </svg>
                        <span x-show="sidebarOpen">Tags</span>
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
                                <p class="text-lg font-semibold text-gray-900">Create tag</p>
                                <p class="text-sm text-gray-500">Add a new tag with a clear title for posts and navigation.</p>
                            </div>
                        </div>

                        <a
                            class="inline-flex items-center justify-center gap-2 rounded-2xl border border-gray-200 px-5 py-3 text-sm font-medium text-gray-600 transition hover:bg-gray-50 hover:text-gray-900"
                            href="{{ route('tag.index') }}"
                        >
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M15 18l-6-6 6-6" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span>Back to tags</span>
                        </a>
                    </div>
                </div>

                <div class="grid gap-6 xl:grid-cols-[minmax(0,1fr)_20rem]">
                    <div class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-gray-200/80 sm:p-8">
                        <div class="border-b border-gray-100 pb-5">
                            <h3 class="text-lg font-semibold text-gray-900">Tag details</h3>
                            <p class="mt-2 max-w-2xl text-sm text-gray-500">
                                Fill in the basic information below. Right now the tag only stores a title.
                            </p>
                        </div>

                        <form action="{{ route('tag.store') }}" class="mt-6 space-y-6" method="POST">
                            @csrf

                            <div class="space-y-2">
                                <x-input-label for="title" value="Tag title" />
                                <x-text-input
                                    id="title"
                                    name="title"
                                    type="text"
                                    class="block w-full rounded-2xl border-gray-200 px-4 py-3 text-sm shadow-none focus:border-sky-500 focus:ring-sky-500"
                                    :value="old('title')"
                                    placeholder="For example: Laravel"
                                    autofocus
                                />
                                <p class="text-sm text-gray-500">
                                    Use a short and readable title that will be shown in the admin panel and on the site.
                                </p>
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>

                            <div class="flex flex-col gap-3 border-t border-gray-100 pt-6 sm:flex-row sm:items-center sm:justify-between">
                                <p class="text-sm text-gray-500">
                                    The tag will be saved immediately after submission.
                                </p>

                                <div class="flex flex-col gap-3 sm:flex-row">
                                    <a
                                        class="inline-flex items-center justify-center rounded-2xl border border-gray-200 px-5 py-3 text-sm font-medium text-gray-600 transition hover:bg-gray-50 hover:text-gray-900"
                                        href="{{ route('tag.index') }}"
                                    >
                                        Cancel
                                    </a>
                                    <button
                                        class="inline-flex items-center justify-center gap-2 rounded-2xl bg-sky-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-sky-700"
                                        type="submit"
                                    >
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path d="M12 5.25v13.5" stroke-linecap="round" />
                                            <path d="M5.25 12h13.5" stroke-linecap="round" />
                                        </svg>
                                        <span>Create tag</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <aside class="rounded-[2rem] bg-slate-900 p-6 text-white shadow-sm sm:p-7">
                        <p class="text-xs uppercase tracking-[0.3em] text-sky-300">Quick note</p>
                        <h3 class="mt-4 text-xl font-semibold">What will be saved</h3>
                        <p class="mt-3 text-sm leading-6 text-slate-300">
                            The current tag structure contains a single required field: title. You can extend it later with slug, description, or status.
                        </p>

                        <div class="mt-6 space-y-3 rounded-[1.5rem] border border-white/10 bg-white/5 p-4">
                            <div class="rounded-2xl bg-white/10 px-4 py-3">
                                <p class="text-xs uppercase tracking-[0.2em] text-slate-400">Field</p>
                                <p class="mt-2 text-sm font-medium text-white">title</p>
                            </div>

                            <div class="rounded-2xl bg-white/10 px-4 py-3">
                                <p class="text-xs uppercase tracking-[0.2em] text-slate-400">Validation</p>
                                <p class="mt-2 text-sm font-medium text-white">required, string, max 255</p>
                            </div>
                        </div>
                    </aside>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
