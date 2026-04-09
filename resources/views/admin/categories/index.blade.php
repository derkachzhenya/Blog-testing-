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
                        C
                    </div>

                    <div class="overflow-hidden transition-opacity duration-200" x-show="sidebarOpen">
                        <p class="text-sm font-semibold">Category</p>
                        <p class="text-xs text-slate-400">Content categories</p>
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
                </nav>
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
            </section>
        </div>
    </div>
</x-app-layout>
