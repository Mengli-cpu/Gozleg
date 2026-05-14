<nav class="navbar navbar-expand-lg navbar-dark custom-nav sticky-top" style="background-color: rgba(15, 23, 42, 0.95); backdrop-filter: blur(10px); border-bottom: 1px solid rgba(255,255,255,0.1);">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ url('/admin') }}" style="font-size: 24px; color: #fff;">
            Göz<span style="color: #0ea5e9;">leg</span>
            <span class="badge ms-2" style="font-size: 10px; background-color: #0ea5e9;">ADMIN</span>
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="adminNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link px-3 {{ Request::is('admin/orders*') ? 'active text-info' : '' }}" href="{{ url('/admin/orders') }}">
                        <i class="bi bi-cart-check me-1"></i> Orders
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 {{ Request::is('admin/products*') ? 'active text-info' : '' }}" href="{{ url('/admin/products') }}">
                        <i class="bi bi-box-seam me-1"></i> Products
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 {{ Request::is('admin/categories*') ? 'active text-info' : '' }}" href="{{ url('/admin/categories') }}">
                        <i class="bi bi-layers me-1"></i> Categories
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link btn btn-sm px-3 text-white no-after {{ Request::is('admin') ? 'btn-info' : 'btn-outline-info' }}" 
                       href="{{ url('/admin') }}" 
                       style="border-radius: 8px; position: relative; z-index: 1;">
                        <i class="bi bi-speedometer2 me-1"></i> Admin
                    </a>
                </li>
                <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                    <a class="nav-link btn btn-sm btn-dark px-3 text-secondary no-after" 
                       href="{{ url('/admin/logout') }}" 
                       style="border-radius: 8px; border: 1px solid rgba(255,255,255,0.1);">
                        <i class="bi bi-arrow-left-circle me-1"></i> Exit
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>