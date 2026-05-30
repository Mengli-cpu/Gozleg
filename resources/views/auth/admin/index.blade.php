@extends('auth.layouts.head')

@section('main-content')
<div class="container-lg py-4">
    <div class="mb-4">
        <h2 class="text-white fw-bold">Admin Dashboard</h2>
        <p class="text-secondary">Welcome back! Here's what's happening with your store today.</p>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="card bg-dark border-0 shadow-sm h-100" style="border-radius: 15px; border-left: 4px solid #0ea5e9 !important;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="rounded-circle bg-info bg-opacity-10 p-3">
                            <i class="bi bi-cart-fill text-info fs-4"></i>
                        </div>
                        <span class="text-success small fw-bold">+12% <i class="bi bi-arrow-up"></i></span>
                    </div>
                    <h3 class="text-white fw-bold mb-1">{{ \App\Models\Order::count() }}</h3>
                    <p class="text-secondary mb-0 small text-uppercase letter-spacing-1">Total Orders</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-dark border-0 shadow-sm h-100" style="border-radius: 15px; border-left: 4px solid #10b981 !important;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="rounded-circle bg-success bg-opacity-10 p-3">
                            <i class="bi bi-currency-dollar text-success fs-4"></i>
                        </div>
                    </div>
                    <h3 class="text-white fw-bold mb-1">{{ number_format(\App\Models\Order::where('status', 'completed')->sum('total_price'), 2) }}</h3>
                    <p class="text-secondary mb-0 small text-uppercase letter-spacing-1">Earnings (TMT)</p>
                </div>
            </div>
        </div>

        <a class="col-md-3" href="{{ route('auth.products.index') }}" style="text-decoration: none;">
            <div class="card bg-dark border-0 shadow-sm h-100" style="border-radius: 15px; border-left: 4px solid #f59e0b !important;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="rounded-circle bg-warning bg-opacity-10 p-3">
                            <i class="bi bi-box-seam text-warning fs-4"></i>
                        </div>
                    </div>
                    <h3 class="a text-white fw-bold mb-1">{{ \App\Models\Product::count() }}</h3>
                    <p class="text-secondary mb-0 small text-uppercase letter-spacing-1">Products</p>
                </div>
            </div>
        </a>

        <a class="col-md-3" style="text-decoration: none;" href="{{ route('auth.products.low_stock') }}">
            <div class="card bg-dark border-0 shadow-sm h-100" style="border-radius: 15px; border-left: 4px solid #ef4444 !important;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="rounded-circle bg-danger bg-opacity-10 p-3">
                            <i class="bi bi-exclamation-triangle text-danger fs-4"></i>
                        </div>
                    </div>
                    <h3 class="text-white fw-bold mb-1">{{ \App\Models\Product::where('stock', '<', 5)->count() }}</h3>
                    <p class="text-secondary mb-0 small text-uppercase letter-spacing-1">Low Stock Alert</p>
                </div>
            </div>
        </a>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card bg-dark border-0 shadow-sm p-4" style="border-radius: 15px;">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="text-white fw-bold mb-0">Recent Orders</h5>
                    <a href="{{ route('auth.orders.index') }}" class="btn btn-sm btn-outline-info">View All</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-dark table-hover align-middle mb-0">
                        <thead class="text-secondary small">
                            <tr>
                                <th class="border-0">ID</th>
                                <th class="border-0">NAME</th>
                                <th class="border-0">STATUS</th>
                                <th class="border-0">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(\App\Models\Order::latest()->take(5)->get() as $order)
                            <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                                <td class="py-3">#{{ $order->id }}</td>
                                <td>{{ $order->user_name ?? 'Guest' }}</td>
                                <td>
                                    <span class="badge bg-opacity-10 text-uppercase" style="font-size: 9px; padding: 5px 10px; background-color: rgba(14, 165, 233, 0.2); color: #0ea5e9;">
                                        {{ $order->status }}
                                    </span>
                                </td>
                                <td class="fw-bold">{{ number_format($order->total_price, 2) }} TMT</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card bg-dark border-0 shadow-sm p-4" style="border-radius: 15px;">
                <h5 class="text-white fw-bold mb-4">Quick Actions</h5>
                <div class="d-grid gap-3">
                    <a href="{{ route('auth.products.create') }}" class="btn btn-info text-white fw-bold py-2">
                        <i class="bi bi-plus-lg me-2"></i> Add New Product
                    </a>
                    <a href="{{ route('auth.categories.create') }}" class="btn btn-outline-secondary text-white py-2">
                        <i class="bi bi-folder-plus me-2"></i> Create Category
                    </a>
                    <hr class="border-secondary opacity-25">
                    <a href="{{ url('/') }}" target="_blank" class="btn btn-link text-info text-decoration-none p-0 small">
                        <i class="bi bi-arrow-up-right-square me-1"></i> Open Live Site
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection