<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Categories') }}
            </h2>

            <div class="hidden items-center gap-2 text-sm text-gray-400 md:flex">
                <a class="font-medium text-sky-600 transition hover:text-sky-700" href="{{ route('dashboard') }}">
                    Dashboard
                </a>
                <span>/</span>
                <span>Categories</span>
            </div>
        </div>
    </x-slot>

    <div class="bg-gray-100 py-8">
        <div class="mx-auto flex max-w-7xl flex-col gap-6 px-4 sm:px-6 lg:flex-row lg:px-8"
            x-data="{ sidebarOpen: true }">
            <aside :class="sidebarOpen ? 'lg:w-64' : 'lg:w-20'"
                class="hidden shrink-0 rounded-[2rem] bg-slate-800 p-4 text-white shadow-xl transition-all duration-300 lg:flex lg:min-h-[32rem] lg:flex-col">
                <div class="flex items-center gap-3 rounded-2xl border border-white/10 bg-white/5 p-3">
                    <div
                        class="flex h-11 w-11 items-center justify-center rounded-2xl bg-white/10 text-lg font-semibold">
                        C
                    </div>

                    <div class="overflow-hidden transition-opacity duration-200" x-show="sidebarOpen">
                        <p class="text-sm font-semibold">Category Admin</p>
                        <p class="text-xs text-slate-400">Content categories</p>
                    </div>
                </div>

                <nav class="mt-6 space-y-2">
                    <a class="flex items-center gap-3 rounded-2xl px-3 py-3 text-sm font-medium text-slate-300 transition hover:bg-white/10 hover:text-white"
                        href="{{ route('dashboard') }}">
                        <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8"
                            viewBox="0 0 24 24">
                            <path d="M3 12.75L12 4l9 8.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M5.25 10.5v8.25a1.5 1.5 0 001.5 1.5h3.75v-5.25h3v5.25h3.75a1.5 1.5 0 001.5-1.5V10.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span x-show="sidebarOpen">Dashboard</span>
                    </a>

                    <a class="flex items-center gap-3 rounded-2xl bg-sky-500/20 px-3 py-3 text-sm font-medium text-white transition hover:bg-sky-500/30"
                        href="{{ route('category.index') }}">
                        <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8"
                            viewBox="0 0 24 24">
                            <path d="M7.5 6.75h9" stroke-linecap="round" />
                            <path d="M7.5 12h9" stroke-linecap="round" />
                            <path d="M7.5 17.25h5.25" stroke-linecap="round" />
                            <path
                                d="M5.25 4.5h13.5A1.5 1.5 0 0120.25 6v12a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V6a1.5 1.5 0 011.5-1.5z"
                                stroke-linejoin="round" />
                        </svg>
                        <span x-show="sidebarOpen">Categories</span>
                    </a>
                </nav>
            </aside>

            <section class="flex-1 space-y-6">
                @if (session('status'))
                    <div
                        class="rounded-[1.5rem] border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm font-medium text-emerald-700 shadow-sm">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="rounded-[2rem] bg-white p-4 shadow-sm ring-1 ring-gray-200/80 sm:p-5">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div class="flex items-center gap-3">
                            <button @click="sidebarOpen = ! sidebarOpen" aria-label="Toggle sidebar"
                                class="inline-flex h-11 w-11 items-center justify-center rounded-2xl border border-gray-200 text-gray-500 transition hover:bg-gray-50 hover:text-gray-700"
                                type="button">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8"
                                    viewBox="0 0 24 24">
                                    <path d="M4.5 7.5h15" stroke-linecap="round" />
                                    <path d="M4.5 12h15" stroke-linecap="round" />
                                    <path d="M4.5 16.5h15" stroke-linecap="round" />
                                </svg>
                            </button>

                            <div>
                                <p class="text-lg font-semibold text-gray-900">Category management</p>
                                <p class="text-sm text-gray-500">This screen is prepared for the category list.</p>
                            </div>
                        </div>

                        <a class="inline-flex items-center justify-center gap-2 rounded-2xl bg-sky-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-sky-700"
                            href="{{ route('category.create') }}">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M12 5.25v13.5" stroke-linecap="round" />
                                <path d="M5.25 12h13.5" stroke-linecap="round" />
                            </svg>
                            <span>Add category</span>
                        </a>
                    </div>
                </div>

                <div class="rounded-[2rem] bg-white p-6 shadow-sm ring-1 ring-gray-200/80 sm:p-8">
                    <div class="flex flex-col gap-3 border-b border-gray-100 pb-5">
                        <h3 class="text-lg font-semibold text-gray-900">All categories</h3>
                        <p class="max-w-2xl text-sm text-gray-500">
                            Unused dashboard actions and duplicate navigation were removed from this page. Add the table
                            or form here when category CRUD is ready.
                        </p>
                    </div>
                    @if($categories->isEmpty())
                        <div
                            class="mt-6 rounded-[1.5rem] border border-dashed border-gray-300 bg-gray-50 px-6 py-10 text-center">
                            <p class="text-base font-medium text-gray-700">No category content yet</p>
                            <p class="mt-2 text-sm text-gray-500">
                                The template is clean now and ready for a categories table.
                            </p>
                        </div>
                    @else
                        <div class="mt-6">
                            <ul class="space-y-2">
                                @foreach($categories as $category)
                                    <li class="flex items-center justify-between gap-4 rounded-[1.5rem] bg-gray-100 px-5 py-4">
                                        <div class="min-w-0">
                                            <p class="truncate text-base font-medium text-gray-900">
                                                {{ $category->title }}
                                            </p>
                                        </div>

                                        <div class="flex items-center gap-2">
                                            <a
                                                class="inline-flex h-10 w-10 items-center justify-center rounded-2xl text-sky-600 transition hover:bg-sky-50 hover:text-sky-700"
                                                href="{{ route('category.show', $category) }}"
                                                title="View category"
                                            >
                                                <span class="sr-only">View category</span>
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                                    <path d="M2.25 12s3.75-6.75 9.75-6.75S21.75 12 21.75 12 18 18.75 12 18.75 2.25 12 2.25 12z" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M12 15.75A3.75 3.75 0 1012 8.25a3.75 3.75 0 000 7.5z" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </a>

                                            <a
                                                class="inline-flex h-10 w-10 items-center justify-center rounded-2xl text-amber-600 transition hover:bg-amber-50 hover:text-amber-700"
                                                href="{{ route('category.edit', $category) }}"
                                                title="Edit category"
                                            >
                                                <span class="sr-only">Edit category</span>
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                                    <path d="M16.862 4.487a2.25 2.25 0 113.182 3.182L8.25 19.463 3.75 20.25l.788-4.5L16.862 4.487z" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </a>

                                            <form action="{{ route('category.destroy', $category) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    class="inline-flex h-10 w-10 items-center justify-center rounded-2xl text-rose-600 transition hover:bg-rose-50 hover:text-rose-700"
                                                    title="Delete category"
                                                    type="submit"
                                                >
                                                    <span class="sr-only">Delete category</span>
                                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                                        <path d="M6.75 7.5h10.5" stroke-linecap="round" />
                                                        <path d="M9.75 3.75h4.5" stroke-linecap="round" />
                                                        <path d="M8.25 7.5v10.125A1.125 1.125 0 009.375 18.75h5.25a1.125 1.125 0 001.125-1.125V7.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M10.5 10.5v4.5" stroke-linecap="round" />
                                                        <path d="M13.5 10.5v4.5" stroke-linecap="round" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
