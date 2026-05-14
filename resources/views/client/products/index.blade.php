@extends('client.layouts.head')
@section('main-content')
<div class="container-lg py-5">
    <div class="row g-4">
        <div class="col-lg-3">
            <div class="card border-0 shadow-sm sticky-top" style="background: #1e293b; border-radius: 20px; top: 90px;">
                <div class="card-body p-4">
                    <form action="{{ route('products.index') }}" method="GET">
                        <h5 class="text-white mb-4"><i class="bi bi-filter-left text-info"></i> {{ __('app.filter') }}</h5>
                        @if(request('query'))
                        <input type="hidden" name="query" value="{{ request('query') }}">
                        @endif

                        <div class="mb-4">
                            <label class="text-secondary small text-uppercase fw-bold mb-2 d-block">{{ __('app.sort_by') }}</label>
                            <select name="sort" class="form-select bg-dark text-white border-0 rounded-3 shadow-none">
                                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>{{ __('app.newest') }}</option>
                                <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>{{ __('app.popular') }}</option>
                                <option value="trending" {{ request('sort') == 'trending' ? 'selected' : '' }}>{{ __('app.trending') }}</option>
                                <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>{{ __('app.price_low') }}</option>
                                <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>{{ __('app.price_high') }}</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="text-secondary small text-uppercase fw-bold mb-2 d-block">{{ __('app.categories') }}</label>
                            <select name="category" class="form-select bg-dark text-white border-0 rounded-3 shadow-none">
                                <option value="">{{ __('app.all_categories') }}</option>
                                @foreach($categories as $c)
                                <option value="{{ $c->id }}" {{ request('category') == $c->id ? 'selected' : '' }}>
                                    {{ $c->{'name_' . app()->getLocale()} ?? $c->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-info w-100 rounded-pill fw-bold py-2 shadow-sm text-white" style="background-color: #0ea5e9;">
                            {{ __('app.apply') }}
                        </button>

                        @if(request()->anyFilled(['query', 'category', 'sort']))
                        <a href="{{ route('products.index') }}" class="btn btn-link btn-sm w-100 mt-2 text-secondary text-decoration-none">
                            {{ __('app.reset') }}
                        </a>
                        @endif
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-white mb-0">{{ __('app.products') }}</h2>
                <span class="text-secondary">{{ __('app.found') }}: {{ $products->total() }}</span>
            </div>
            <div class="row">
                @foreach ($products as $np)
                <div class="col-6 col-md-3 col-lg-4 mb-4">
                    @include('client.partials.product-card')
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection