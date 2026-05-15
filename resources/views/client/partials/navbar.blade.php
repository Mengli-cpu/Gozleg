<nav class="navbar navbar-expand-lg navbar-dark custom-nav sticky-top" style="background-color: rgba(15, 23, 42, 0.9); backdrop-filter: blur(10px);">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}" style="font-size: 32px; color: #fff;">
            Göz<span class="brand-accent" style="color: #0ea5e9;">leg</span>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item dropdown position-static">
                    <a class="nav-link px-3 dropdown-toggle" href="#" id="catDrop" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-grid-fill me-1" style="color: #60a5fa;"></i> {{ __('app.categories') ?? 'Категории' }}
                    </a>
                    <div class="dropdown-menu w-100 border-0 shadow-lg mt-0 py-4" style="background: #1e293b; border-bottom: 3px solid #0ea5e9 !important; border-radius: 0 0 20px 20px;">
                        <div class="container">
                            <div class="row g-3">
                                <div class="col-12 col-xl-6">
                                    <div class="row g-2">
                                        @foreach ($categories as $c)
                                        <div class="col-6 col-md-4">
                                            <a class="dropdown-item rounded-pill text-white bg-dark px-3 py-2 shadow-sm d-flex align-items-center"
                                                href='{{ route('categories.show',$c->id) }}' style="border: 1px solid #334155;">
                                                <i class="bi bi-circle-fill me-2" style="font-size: 0.5rem; color: #0ea5e9;"></i>
                                                <span class="text-truncate">{{ $c->{'name_' . app()->getLocale()} ?? $c->name }}</span>
                                            </a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-12 col-xl-6 d-none d-md-block">
                                    <div class="row g-2 h-100">
                                        <div class="col-md-6">
                                            <div class="p-3 rounded-4 shadow-sm h-100 d-flex text-white flex-column justify-content-between"
                                                style="background: linear-gradient(135deg, #0ea5e9, #a855f7);">
                                                <div>
                                                    <h6 class="fw-bold mb-1">
                                                        {{ app()->getLocale() == 'ru' ? 'Скидка 50%!' : (app()->getLocale() == 'en' ? '50% Off!' : '50% Arzanladyş!') }}
                                                    </h6>
                                                    <p class="mb-2" style="font-size: 0.8rem; opacity: 0.9;">
                                                        {{ app()->getLocale() == 'ru' ? 'Успей купить по выгодной цене.' : (app()->getLocale() == 'en' ? 'Buy now at the best price.' : 'Amatly bahadan satyn almaga ýetişiň.') }}
                                                    </p>
                                                </div>
                                                <a href="/products" class="btn btn-light btn-sm rounded-pill py-0 px-3 align-self-start fw-bold" style="font-size: 0.75rem; color: #a855f7;">
                                                    {{ app()->getLocale() == 'ru' ? 'Подробнее' : (app()->getLocale() == 'en' ? 'More' : 'Dowamy') }}
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="p-3 rounded-4 shadow-sm h-100 d-flex flex-column justify-content-between"
                                                style="background: linear-gradient(135deg, #f59e0b, #ef4444); color: white;">
                                                <div>
                                                    <h6 class="fw-bold mb-1">
                                                        {{ app()->getLocale() == 'ru' ? 'Новинки!' : (app()->getLocale() == 'en' ? 'New Arrival!' : 'Täze harytlar!') }}
                                                    </h6>
                                                    <p class="mb-2" style="font-size: 0.8rem; opacity: 0.9;">
                                                        {{ app()->getLocale() == 'ru' ? 'Посмотри свежее поступление товаров.' : (app()->getLocale() == 'en' ? 'Check out our latest collection.' : 'Täze gelen harytlary görkeziň.') }}
                                                    </p>
                                                </div>
                                                <a href="#" class="btn btn-light btn-sm rounded-pill py-0 px-3 align-self-start fw-bold" style="font-size: 0.75rem; color: #ef4444;">
                                                    {{ app()->getLocale() == 'ru' ? 'Перейти' : (app()->getLocale() == 'en' ? 'Go' : 'Görmek') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('products*') ? 'active' : '' }}" href="{{ url('/products') }}">
                        <i class="bi bi-bag-heart me-1 text-danger"></i> {{ __('app.shop') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                        <i class="bi bi-house me-1 text-danger"></i> {{ __('app.home') }}
                    </a>
                </li>
            </ul>
            <form class="d-flex mx-auto col-12 col-lg-4" action="{{ url('/products') }}" method="GET">
                <div class="input-group search-group shadow-sm" style="border-radius: 12px; overflow: hidden;">
                    <input type="text" name="query" class="form-control text-white border-0 shadow-none px-3"
                        placeholder="{{ __('app.search') }}"
                        style="background-color: #334155 !important;">
                    <button class="btn border-0" type="submit" style="background-color: #334155;">
                        <i class="bi bi-search" style="color: #0ea5e9;"></i>
                    </button>
                </div>
            </form>
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item me-2">
                    <a class="nav-link" data-bs-toggle="offcanvas" href="#settingsSidebar" role="button">
                        <i class="bi bi-sliders2-vertical fs-5" style="color: #94a3b8;"></i>
                    </a>
                </li>
                <li class="nav-item dropdown me-lg-3">
                    <a class="nav-link dropdown-toggle px-3" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-translate me-1" style="color: #3b82f6;"></i> {{ strtoupper(app()->getLocale()) }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end border-0 shadow-lg" style="background: #1e293b; border-top: 2px solid #a855f7 !important;">
                        <li><a class="dropdown-item" href="{{ url('/lang/en') }}">English</a></li>
                        <li><a class="dropdown-item" href="{{ url('/lang/ru') }}">Русский</a></li>
                        <li><a class="dropdown-item" href="{{ url('/lang/tm') }}">Turkmen</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle d-flex align-items-center" href="#" data-bs-toggle="dropdown">
                        <div class="d-flex align-items-center justify-content-center rounded-circle border border-info border-2 shadow-sm"
                            style="width: 42px; height: 42px; background: #22edba4c; backdrop-filter: blur(4px); transition: all 0.3s ease;">
                            <i class="bi bi-person-fill text-white" style="font-size: 1.2rem;"></i>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end border-0 shadow-lg p-2" style="background: #1e293b; min-width: 200px;">
                        <li><a class="dropdown-item rounded-3" href="#"><i class="bi bi-person me-2"></i> Profil</a></li>
                        <li><a class="dropdown-item rounded-3" href="/orders"><i class="bi bi-box-seam me-2"></i> Orders</a></li>
                        <li>
                            <hr class="dropdown-divider bg-secondary">
                        </li>
                        <li><a class="dropdown-item rounded-3 text-danger" href="#"><i class="bi bi-power me-2"></i> Exit</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="offcanvas offcanvas-end shadow" tabindex="-1" id="settingsSidebar" style="background: #0f172a; color: white; border-left: 1px solid #1e293b;">
    <div class="offcanvas-header border-bottom border-secondary">
        <h5 class="offcanvas-title"><i class="bi bi-gear-fill me-2 text-info"></i> Setting</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <div class="mb-4">
            <label class="text-secondary small text-uppercase fw-bold mb-2 d-block">Theme</label>
            <button class="btn btn-dark w-100 d-flex justify-content-between align-items-center rounded-3 mb-2" style="background: #1e293b;">
                <span>Dark theme</span>
                <i class="bi bi-moon-stars-fill text-warning"></i>
            </button>
        </div>
        <div class="mb-4">
            <label class="text-secondary small text-uppercase fw-bold mb-2 d-block">
                Currency</label>
            <select class="form-select bg-dark text-white border-0 rounded-3" style="background-color: #1e293b !important;">
                <option selected>TMT (Manat)</option>
            </select>
        </div>
        <div class="p-3 rounded-4 mt-auto" style="background: #1e293b;">
            <p class="small text-secondary mb-0">Version</p>
        </div>
    </div>
</div>