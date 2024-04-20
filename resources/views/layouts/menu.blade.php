<div class="video-bg">
    <video width="320" height="240" autoplay loop muted>
        <source src="{{ asset('videos/grey.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>
{{-- <div class="dark-light">
        <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round"
            stroke-linejoin="round">
            <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" />
        </svg>
    </div> --}}
<div class="app">
    <div class="header">
        <div class="header-profile">
        </div>
    </div>
    <div class="wrapper">
        <div class="left-side">
            <div class="side-wrapper">
                <div class="side-title">Jobs</div>
                <div class="side-menu">
                    <a href="{{ route('profile.index') }}">
                        <div class="px-2">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        All Jobs
                    </a>
                    <a href="#">
                        <div class="px-2">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                        Updates
                        <span class="notification-number updates">3</span>
                    </a>
                </div>
            </div>
            <div class="side-wrapper">
                <div class="side-title">Categories</div>
                <div class="side-menu">
                    @foreach ($categories as $c)
                        <a href="{{ route('profile_category', $c['id']) }}">{{ $c['name'] }}</a>
                    @endforeach
                </div>
            </div>
            <div class="side-wrapper">
                <div class="side-title">Resource Links</div>
                <div class="side-menu">
                    <a href="#">
                        <svg viewBox="0 0 512 512" fill="currentColor">
                            <path
                                d="M467 0H45C20.186 0 0 20.186 0 45v422c0 24.814 20.186 45 45 45h422c24.814 0 45-20.186 45-45V45c0-24.814-20.186-45-45-45zM181 241c41.353 0 75 33.647 75 75s-33.647 75-75 75-75-33.647-75-75c0-8.291 6.709-15 15-15s15 6.709 15 15c0 24.814 20.186 45 45 45s45-20.186 45-45-20.186-45-45-45c-41.353 0-75-33.647-75-75s33.647-75 75-75 75 33.647 75 75c0 8.291-6.709 15-15 15s-15-6.709-15-15c0-24.814-20.186-45-45-45s-45 20.186-45 45 20.186 45 45 45zm180 120h30c8.291 0 15 6.709 15 15s-6.709 15-15 15h-30c-24.814 0-45-20.186-45-45V211h-15c-8.291 0-15-6.709-15-15s6.709-15 15-15h15v-45c0-8.291 6.709-15 15-15s15 6.709 15 15v45h45c8.291 0 15 6.709 15 15s-6.709 15-15 15h-45v135c0 8.276 6.724 15 15 15z" />
                        </svg>
                        Stock
                    </a>
                </div>
            </div>
        </div>
        <div class="main-container">
            <div class="main-header">
                {{-- <a class="menu-link-main" href="{{ route('profile.index') }}">All Jobs</a> --}}
                <div class="header-menu">
                    <a class="menu-link-main" href="{{ route('profile.index') }}">All Jobs</a>
                    <div class="dropdown-container-profile">
                        <div class="dropdown-button-profile" onclick="toggleDropdownProfile()">
                            <span class="dropdown-text-profile">Categories</span>
                            <span class="dropdown-chevron-profile"></span>
                        </div>
                        <div class="dropdown-menu-profile">
                            @foreach ($categories as $c)
                                <a
                                    href="{{ route('jobsCategory', $c['id']) }}">{{ $c['name'] }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
