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
                        <a href="{{ route('profileCategory', $c['id']) }}">{{ $c['name'] }}</a>
                    @endforeach
                </div>
            </div>
            <div class="side-wrapper">
                <div class="side-title">Resource Links</div>
                <div class="side-menu">
                    <a href="#">
                        <i class="fas fa-graduation-cap p-2"></i>
                        ...
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
                                    href="{{ route('profileCategory', $c['id']) }}">{{ $c['name'] }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
