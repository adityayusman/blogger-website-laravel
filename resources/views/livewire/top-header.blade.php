<div class="sticky-top">
    <header class="navbar navbar-expand-md navbar-light sticky-top d-print-none">
        <div class="container-xl">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                <a href="{{ route('author.home') }}">
                    <img src="{{ \App\Models\Setting::find(1)->blog_logo }}" width="110" height="32"
                        alt="Tabler" class="navbar-brand-image">
                </a>
            </h1>
            <div class="navbar-nav flex-row order-md-last">
                <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode"
                    data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                    </svg>
                </a>
                <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode"
                    data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="12" cy="12" r="4" />
                        <path
                            d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                    </svg>
                </a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                        aria-label="Open user menu">
                        <span class="avatar avatar-sm" style="background-image: url({{ $author->picture }})"></span>
                        <div class="d-none d-xl-block ps-2">
                            <div>{{ $author->name }}</div>
                            <div class="mt-1 small text-muted">{{ $author->username }}</div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <a href="{{ route('author.profile') }}" class="dropdown-item">Profile</a>
                        <div class="dropdown-divider"></div>
                        {{-- Logout --}}
                        <a href="{{ route('author.logout') }}" class="dropdown-item"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form action="{{ route('author.logout') }}" id="logout-form" method="post">
                            @csrf
                        </form>
                        {{-- Logout --}}
                    </div>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbar-menu">
                <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('author.home') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Home
                                </span>
                            </a>
                        </li>

                        @if (auth()->user()->type == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('author.categories') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <line x1="4" y1="6" x2="20" y2="6">
                                            </line>
                                            <line x1="4" y1="12" x2="20" y2="12">
                                            </line>
                                            <line x1="4" y1="18" x2="20" y2="18">
                                            </line>
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Categories
                                    </span>
                                </a>
                            </li>
                        @endif

                        @if (auth()->user()->type == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('author.authors') }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/users -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <circle cx="9" cy="7" r="4" />
                                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                            <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Authors
                                    </span>
                                </a>
                            </li>
                        @endif

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown"
                                data-bs-auto-close="outside" role="button" aria-expanded="false">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <rect x="4" y="4" width="6" height="5"
                                            rx="2" />
                                        <rect x="4" y="13" width="6" height="7"
                                            rx="2" />
                                        <rect x="14" y="4" width="6" height="7"
                                            rx="2" />
                                        <rect x="14" y="15" width="6" height="5"
                                            rx="2" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Posts
                                </span>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('author.posts.add-post') }}">
                                    Add new
                                </a>
                                <a class="dropdown-item" href="{{ route('author.posts.all_posts') }}">
                                    All Posts
                                </a>

                            </div>
                        </li>

                        @if (auth()->user()->type == 1)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown"
                                    data-bs-auto-close="outside" role="button" aria-expanded="false">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/layout-2 -->
                                        <!-- Download SVG icon from http://tabler-icons.io/i/tool -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M7 10h3v-3l-3.5 -3.5a6 6 0 0 1 8 8l6 6a2 2 0 0 1 -3 3l-6 -6a6 6 0 0 1 -8 -8l3.5 3.5" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Settings
                                    </span>
                                </a>
                                <div class="dropdown-menu">
                                    <div class="dropdown-menu-columns">
                                        <div class="dropdown-menu-column">
                                            <a class="dropdown-item" href="{{ route('author.settings') }}">
                                                General Settings
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endif

                    </ul>
                </div>
            </div>
        </div>
    </header>
</div>
