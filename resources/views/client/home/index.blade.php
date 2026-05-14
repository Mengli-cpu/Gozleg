@extends('client.layouts.head')

@section('main-content')
<div class="container-lg py-5">
    <div class="p-5 mb-5 rounded-4 shadow-sm text-white"
        style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); border: 1px solid #334155;">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h1 class="display-4 fw-bold mb-3">Gözleg — Tapmak Bizden!</h1>
                <p class="lead opacity-75 mb-4">{{ __('app.text') }}</p>
                <a href="/products" class="btn btn-info btn-lg rounded-pill px-5 fw-bold text-white shadow">
                    {{ __('app.shop_now')}}
                </a>
            </div>
            <div class="col-lg-5 d-none d-lg-block text-center">
                <i class="bi bi-rocket-takeoff text-info" style="font-size: 150px; opacity: 0.5;"></i>
            </div>
        </div>
    </div>
    <h2 class="text-white mb-4">{{ __('app.new_arrivals') }}</h2>

    <div class="row g-4">
        @foreach ($newProducts as $np)
        @include('client.partials.product-card')
        @endforeach
    </div>
    <h2 class="text-white my-4">{{ __('app.recommended') }}</h2>

    <div class="row g-4">
        @foreach ($recommended as $np)
        @include('client.partials.product-card')
        @endforeach
    </div>
    <h2 class="text-white my-4">{{ __('app.popular') }} (Top 10)</h2>

    <div class="row g-4">
        @foreach ($popular as $np)
        @include('client.partials.product-card')
        @endforeach
    </div>
</div>
@endsection