@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Home')
@section('content')
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Dashboard
                </h2>
            </div>
        </div>
    </div>

    <div class="row row-cards mt-2">
        <div class="col-md-4">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <a href="{{ route('author.authors') }}">
                                <span class="bg-primary text-white avatar">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/users -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                    </svg>
                                </span>
                            </a>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">
                                Authors
                            </div>
                            <div class="text-muted">
                                {{ $authors }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <a href="{{ route('author.categories') }}">
                                <span class="bg-yellow text-white avatar">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="4" y1="6" x2="20" y2="6">
                                        </line>
                                        <line x1="4" y1="12" x2="20" y2="12">
                                        </line>
                                        <line x1="4" y1="18" x2="20" y2="18">
                                        </line>
                                    </svg>
                                </span>
                            </a>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">
                                Categories
                            </div>
                            <div class="text-muted">
                                {{ $categories }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <a href="{{ route('author.posts.all_posts') }}">
                                <span class="bg-green text-white avatar">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <rect x="4" y="4" width="6" height="5" rx="2" />
                                        <rect x="4" y="13" width="6" height="7" rx="2" />
                                        <rect x="14" y="4" width="6" height="7"
                                            rx="2" />
                                        <rect x="14" y="15" width="6" height="5"
                                            rx="2" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">
                                Posts
                            </div>
                            <div class="text-muted">
                                {{ $posts }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
