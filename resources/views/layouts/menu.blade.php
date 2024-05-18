
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
                        <a href="{{ route('profile.edit', $c['id']) }}">{{ $c['name'] }}</a>
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
                                    href="{{ route('profile.edit', $c['id']) }}">{{ $c['name'] }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
