<!-- Header Start -->
<div class="container-xxl py-5 bg-dark page-header mb-5">
    <div class="container my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">{{ $pageTitle }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                @foreach ($breadcrumbLinks as $link)
                    <li class="breadcrumb-item"><a href="{{ $link['url'] }}" class="{{ request()->is($link['url']) ? 'active' : '' }}">{{ $link['label'] }}</a></li>
                @endforeach
            </ol>
        </nav>
    </div>
</div>
<!-- Header End -->