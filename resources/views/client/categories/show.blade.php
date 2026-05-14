@extends('client.layouts.head')
@section('main-content')
<div class="container-lg py-5">
    <h2 class="text-white mb-4">{{ $category->{'name_' . app()->getLocale()} ?? $category->name }}</h2>

    <div class="row g-4">
        @foreach ($products as $np)
        <div class="col-6 col-md-4 col-lg-3 mb-4">
            @include('client.partials.product-card')
        </div>
        @endforeach
    </div>
</div>

@endsection