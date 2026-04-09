@extends('main.index')
@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
        <div class="container py-2">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">MyBlog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
                aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <section class="bg-light py-5">
        <div class="container py-lg-5">
            <div class="row align-items-center g-4">
                <div class="col-lg-6">
                    <span class="badge bg-primary mb-3">New Blog</span>
                    <h1 class="display-5 fw-bold mb-3">A simple homepage for your Laravel blog</h1>
                    <p class="lead text-muted mb-4">
                        Publish articles, share notes, and organize your content with categories and tags.
                    </p>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="#" class="btn btn-primary btn-lg">Read Articles</a>
                        <a href="#" class="btn btn-outline-secondary btn-lg">About Project</a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4 p-md-5">
                            <h2 class="h4 mb-3">Why this template is useful</h2>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item px-0">Responsive layout built with Bootstrap 5</li>
                                <li class="list-group-item px-0">Clear hero section with call-to-action buttons</li>
                                <li class="list-group-item px-0">Content blocks that are easy to replace with real data</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">What you can place on the homepage</h2>
                <p class="text-muted mb-0">Basic sections to get started without extra complexity.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h3 class="h5 card-title">Latest Articles</h3>
                            <p class="card-text text-muted">
                                Show recent posts and short previews directly on the homepage.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h3 class="h5 card-title">Categories</h3>
                            <p class="card-text text-muted">
                                Highlight the main sections of the blog so visitors can navigate more easily.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h3 class="h5 card-title">Tags</h3>
                            <p class="card-text text-muted">
                                Add popular topics and quick links to the content users care about.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-dark text-white">
        <div class="container text-center">
            <h2 class="fw-bold mb-3">Ready for further content</h2>
            <p class="mb-4 text-white-50">
                Once you add models, posts, and categories, this template can be quickly connected to your database.
            </p>
            <a href="#" class="btn btn-light btn-lg">Start Building</a>
        </div>
    </section>
@endsection
