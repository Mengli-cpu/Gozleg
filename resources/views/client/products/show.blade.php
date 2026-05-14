@extends('client.layouts.head')

@section('main-content')
<div class="container py-5">
    <div class="row g-5">
        <div class="col-md-5">
            <div class="card border-0 shadow-lg" style="background: #1e293b; border-radius: 30px; overflow: hidden;">
                <img src="{{ ($product->id && file_exists(public_path('img/'.$product->id.'.jpg'))) ? asset('img/'.$product->id.'.jpg') : asset('img/default.jpg') }}"
                    class="img-fluid w-100" alt="{{ $product->name }}"
                    style="object-fit: cover; height: 500px;">
            </div>
        </div>

        <div class="col-md-6">
            <nav aria-label="breadcrumb" class="mb-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/products') }}" class="text-info text-decoration-none">{{ __('app.shop') }}</a></li>
                    <li class="breadcrumb-item text-secondary active">{{ $product->category->name ?? 'Category' }}</li>
                </ol>
            </nav>

            <h1 class="text-white fw-bold mb-3">{{ $product->{'name_' . app()->getLocale()} ?? $product->name }}</h1>

            <div class="d-flex align-items-center mb-4">
                <span class="h2 text-info fw-bold mb-0">{{ number_format($product->price, 2) }} TMT</span>
                @if($product->stock > 0)
                <span class="badge bg-success ms-3 rounded-pill px-3">{{ __('app.in_stock') ?? 'В наличии' }}</span>
                @else
                <span class="badge bg-danger ms-3 rounded-pill px-3">{{ __('app.out_of_stock') ?? 'Нет в наличии' }}</span>
                @endif
            </div>

            <p class="text-secondary mb-5" style="line-height: 1.8; font-size: 1.1rem;">
                {{ $product->{'description_' . app()->getLocale()} ?? $product->description }}
            </p>

            <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <div class="d-flex align-items-center mb-4">
                    <div class="input-group me-3" style="width: 140px;">
                        <button class="btn btn-outline-secondary border-0 bg-dark text-white" type="button" onclick="changeQty(-1)">-</button>

                        <input type="number" name="quantity" id="quantity"
                            class="form-control bg-dark text-white border-0 text-center fw-bold shadow-none"
                            value="1" min="1">

                        <button class="btn btn-outline-secondary border-0 bg-dark text-white" type="button" onclick="changeQty(1)">+</button>
                    </div>

                    <button type="submit" class="btn btn-info btn-lg rounded-pill px-5 fw-bold text-white shadow" style="background: #0ea5e9;">
                        <i class="bi bi-cart-plus me-2"></i> {{ __('app.buy_now') ?? 'Купить' }}
                    </button>
                </div>
            </form>


            <div class="mt-5 p-4 rounded-4" style="background: rgba(14, 165, 233, 0.05); border: 1px solid rgba(14, 165, 233, 0.1);">
                <div class="d-flex align-items-center text-white mb-2">
                    <i class="bi bi-truck me-3 text-info fs-4"></i>
                    <span>{{ __('app.fast_delivery') }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function changeQty(val) {
        const input = document.getElementById('quantity');
        let res = parseInt(input.value) + val;
        if (res < 1) res = 1;
        input.value = res;
    }
</script>
@endsection