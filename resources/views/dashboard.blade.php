<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Dashboard') }}
            </h2>

            <div class="hidden items-center gap-2 text-sm text-gray-400 md:flex">
                <a class="font-medium text-sky-600 transition hover:text-sky-700" href="{{ route('home') }}">
                    Home
                </a>
                <span>/</span>
                <span>Dashboard v1</span>
            </div>
        </div>
    </x-slot>

    <div class="bg-gray-100 py-8">
        <div class="mx-auto flex max-w-7xl flex-col gap-6 px-4 sm:px-6 lg:flex-row lg:px-8" x-data="{ sidebarOpen: true }">
            <aside
                :class="sidebarOpen ? 'lg:w-64' : 'lg:w-20'"
                class="hidden shrink-0 rounded-[2rem] bg-slate-800 p-4 text-white shadow-xl transition-all duration-300 lg:flex lg:min-h-[38rem] lg:flex-col"
            >
                <div class="flex items-center gap-3 rounded-2xl border border-white/10 bg-white/5 p-3">
                    <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-white/10 text-lg font-semibold">
                        B
                    </div>

                    <div class="overflow-hidden transition-opacity duration-200" x-show="sidebarOpen">
                        <p class="text-sm font-semibold">Blog Admin</p>
                        <p class="text-xs text-slate-400">Content dashboard</p>
                    </div>
                </div>

                <nav class="mt-6 space-y-2">
                    <a
                        class="flex items-center gap-3 rounded-2xl bg-sky-500/20 px-3 py-3 text-sm font-medium text-white transition hover:bg-sky-500/30"
                        href="{{ route('dashboard') }}"
                    >
                        <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path d="M3 12.75L12 4l9 8.75" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M5.25 10.5v8.25a1.5 1.5 0 001.5 1.5h3.75v-5.25h3v5.25h3.75a1.5 1.5 0 001.5-1.5V10.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span x-show="sidebarOpen">Dashboard</span>
                    </a>

                    <a
                        class="flex items-center gap-3 rounded-2xl px-3 py-3 text-sm font-medium text-slate-300 transition hover:bg-white/10 hover:text-white"
                        href="{{ route('category.index') }}"
                    >
                        <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path d="M7.5 6.75h9" stroke-linecap="round" />
                            <path d="M7.5 12h9" stroke-linecap="round" />
                            <path d="M7.5 17.25h5.25" stroke-linecap="round" />
                            <path d="M5.25 4.5h13.5A1.5 1.5 0 0120.25 6v12a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V6a1.5 1.5 0 011.5-1.5z" stroke-linejoin="round" />
                        </svg>
                        <span x-show="sidebarOpen">Category</span>
                    </a>

                    <a
                        class="flex items-center gap-3 rounded-2xl px-3 py-3 text-sm font-medium text-slate-300 transition hover:bg-white/10 hover:text-white"
                        href="{{ route('profile.edit') }}"
                    >
                        <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path d="M15.75 6.75a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M4.5 19.125a7.125 7.125 0 0115 0" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span x-show="sidebarOpen">Users</span>
                    </a>

                    <a
                        class="flex items-center gap-3 rounded-2xl px-3 py-3 text-sm font-medium text-slate-300 transition hover:bg-white/10 hover:text-white"
                        href="{{ route('profile.edit') }}"
                    >
                        <svg class="h-5 w-5 shrink-0" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path d="M4.5 12a7.5 7.5 0 1115 0 7.5 7.5 0 01-15 0z" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M12 9v3l2.25 2.25" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span x-show="sidebarOpen">Analytics</span>
                    </a>
                </nav>

                <div class="mt-auto rounded-[1.5rem] bg-white/5 p-4" x-show="sidebarOpen">
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-400">Today</p>
                    <p class="mt-3 text-2xl font-semibold">12 scheduled posts</p>
                    <p class="mt-2 text-sm text-slate-300">
                        Keep an eye on new registrations and visitor activity from this panel.
                    </p>
                </div>
            </aside>

            <section class="flex-1 space-y-6">
                <div class="rounded-[2rem] bg-white p-4 shadow-sm ring-1 ring-gray-200/80 sm:p-5">
                    <div class="flex flex-col gap-4 xl:flex-row xl:items-center xl:justify-between">
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
                                <p class="text-lg font-semibold text-gray-900">Dashboard overview</p>
                                <p class="text-sm text-gray-500">Track the main admin metrics from one screen.</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-2 sm:flex xl:hidden">
                            <a
                                class="rounded-2xl bg-slate-800 px-4 py-2 text-center text-sm font-medium text-white transition hover:bg-slate-700"
                                href="{{ route('dashboard') }}"
                            >
                                Dashboard
                            </a>
                            <a
                                class="rounded-2xl bg-white px-4 py-2 text-center text-sm font-medium text-gray-600 ring-1 ring-gray-200 transition hover:bg-gray-50"
                                href="{{ route('home') }}"
                            >
                                Posts
                            </a>
                            <a
                                class="rounded-2xl bg-white px-4 py-2 text-center text-sm font-medium text-gray-600 ring-1 ring-gray-200 transition hover:bg-gray-50"
                                href="{{ route('profile.edit') }}"
                            >
                                Users
                            </a>
                            <a
                                class="rounded-2xl bg-white px-4 py-2 text-center text-sm font-medium text-gray-600 ring-1 ring-gray-200 transition hover:bg-gray-50"
                                href="{{ route('profile.edit') }}"
                            >
                                Settings
                            </a>
                        </div>
                    </div>
                </div>

                <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
                    <div class="overflow-hidden rounded-[1.75rem] text-white shadow-lg shadow-sky-500/20">
                        <div class="bg-sky-500 px-6 py-5">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <p class="text-4xl font-bold">150</p>
                                    <p class="mt-3 text-sm font-medium text-white/85">New Orders</p>
                                </div>

                                <svg class="h-14 w-14 text-white/20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                    <path d="M7.5 8.25V6.75a4.5 4.5 0 119 0v1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M5.25 8.25h13.5l-1.2 10.2a1.5 1.5 0 01-1.49 1.3H7.44a1.5 1.5 0 01-1.49-1.3l-1.2-10.2z" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                        <a class="flex items-center justify-center gap-2 bg-sky-600 px-6 py-3 text-sm font-medium text-white/90 transition hover:bg-sky-700" href="{{ route('dashboard') }}">
                            More info
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M9 6l6 6-6 6" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>

                    <div class="overflow-hidden rounded-[1.75rem] text-white shadow-lg shadow-emerald-500/20">
                        <div class="bg-emerald-500 px-6 py-5">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <p class="text-4xl font-bold">53%</p>
                                    <p class="mt-3 text-sm font-medium text-white/85">Bounce Rate</p>
                                </div>

                                <svg class="h-14 w-14 text-white/20" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M5 10.5a1 1 0 011-1h1a1 1 0 011 1V18a1 1 0 01-1 1H6a1 1 0 01-1-1v-7.5zM10.5 6a1 1 0 011-1h1a1 1 0 011 1v12a1 1 0 01-1 1h-1a1 1 0 01-1-1V6zM16 12.5a1 1 0 011-1h1a1 1 0 011 1V18a1 1 0 01-1 1h-1a1 1 0 01-1-1v-5.5z" />
                                </svg>
                            </div>
                        </div>
                        <a class="flex items-center justify-center gap-2 bg-emerald-600 px-6 py-3 text-sm font-medium text-white/90 transition hover:bg-emerald-700" href="{{ route('dashboard') }}">
                            More info
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M9 6l6 6-6 6" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>

                    <div class="overflow-hidden rounded-[1.75rem] text-slate-900 shadow-lg shadow-amber-400/20">
                        <div class="bg-amber-400 px-6 py-5">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <p class="text-4xl font-bold">44</p>
                                    <p class="mt-3 text-sm font-medium text-slate-800/80">User Registrations</p>
                                </div>

                                <svg class="h-14 w-14 text-slate-900/15" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M15 8a3.5 3.5 0 11-7 0 3.5 3.5 0 017 0zM4.5 18.25c0-2.9 3.15-5.25 7.5-5.25s7.5 2.35 7.5 5.25V19H4.5v-.75zM18 7.5h1.75V5.75h1.5V7.5H23v1.5h-1.75v1.75h-1.5V9H18V7.5z" />
                                </svg>
                            </div>
                        </div>
                        <a class="flex items-center justify-center gap-2 bg-amber-500 px-6 py-3 text-sm font-medium text-slate-900/80 transition hover:bg-amber-600" href="{{ route('dashboard') }}">
                            More info
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M9 6l6 6-6 6" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>

                    <div class="overflow-hidden rounded-[1.75rem] text-white shadow-lg shadow-rose-500/20">
                        <div class="bg-rose-500 px-6 py-5">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <p class="text-4xl font-bold">65</p>
                                    <p class="mt-3 text-sm font-medium text-white/85">Unique Visitors</p>
                                </div>

                                <svg class="h-14 w-14 text-white/20" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 3a9 9 0 109 9h-9V3z" />
                                    <path d="M14 3.25A9 9 0 0120.75 10H14V3.25z" />
                                </svg>
                            </div>
                        </div>
                        <a class="flex items-center justify-center gap-2 bg-rose-600 px-6 py-3 text-sm font-medium text-white/90 transition hover:bg-rose-700" href="{{ route('dashboard') }}">
                            More info
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M9 6l6 6-6 6" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
