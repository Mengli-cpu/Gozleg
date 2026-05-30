@extends('auth.layouts.head')

@section('main-content')
<div class="container-fluid px-4 mt-4 mb-5">
    <div class="mb-3">
        <a href="{{ route('auth.products.index') }}" class="text-decoration-none text-info fw-bold">
            <i class="bi bi-arrow-left"></i> Back to Products Management
        </a>
    </div>

    <div class="card border-0 shadow-lg" style="background-color: #1e293b; border-radius: 15px; overflow: hidden;">
        <div class="card-body p-4">

            <div class="row g-4">
                <div class="col-xl-4 col-lg-5 text-center text-lg-start">
                    <div class="position-relative mx-auto mb-3" style="max-width: 350px; aspect-ratio: 1/1;">
                        <img src="{{ asset($product->img ? 'storage/' . $product->img : 'img/default.jpg') }}"
                            class="rounded-4 w-100 h-100 object-fit-cover shadow border border-secondary"
                            alt="Product Image">
                    </div>

                    <div class="d-flex justify-content-center gap-2 mt-3">
                        <a href="{{ route('auth.products.edit', $product->id) }}" class="btn btn-info text-white fw-bold px-4" style="border-radius: 10px; background-color: #0ea5e9;">
                            <i class="bi bi-pencil-square me-1"></i> Edit Product
                        </a>

                        <form action="{{ route('auth.products.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger fw-bold px-4" style="border-radius: 10px;"
                                onclick="return confirm('Really delete this product?')">
                                <i class="bi bi-trash3 me-1"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>

                <div class="col-xl-8 col-lg-7">
                    <div class="d-flex flex-wrap justify-content-between align-items-start gap-2 mb-3">
                        <div>
                            <span class="text-secondary small">Product #{{ $product->id }}</span>
                            <h2 class="text-white fw-bold mb-1">{{ $product->name ?: $product->name_ru ?: $product->name_tm }}</h2>

                            <div class="d-flex gap-2 align-items-center mt-2">
                                <div class="badge rounded-pill bg-dark border border-secondary fw-normal px-3">
                                    <i class="bi bi-shop me-1 text-info"></i> {{ $product->shop }}
                                </div>
                                <span class="text-secondary text-info small">{{ $product->category->name_ru ?? 'No Category' }}</span>
                            </div>
                        </div>

                        <div class="text-lg-end bg-dark p-3 rounded-3 border border-secondary" style="min-width: 180px;">
                            <div class="text-info fw-bold fs-4 mb-1">{{ number_format($product->price, 2) }} <small class="fs-6">TMT</small></div>
                            <span class="badge {{ $product->stock < 5 ? 'bg-danger' : 'bg-success' }} px-3 py-2">
                                <i class="bi bi-box me-1"></i> {{ $product->stock }} items left
                            </span>
                        </div>
                    </div>

                    <hr class="border-secondary opacity-25 my-4">

                    <h5 class="text-secondary mb-3 small fw-bold text-uppercase tracking-wider">Product Content Translations</h5>

                    <ul class="nav nav-tabs border-secondary mb-3" id="langTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active text-white border-0 px-4 py-2 small" id="tm-tab" data-bs-toggle="tab" data-bs-target="#tm-content" type="button" role="tab" style="border-radius: 8px 8px 0 0;">
                                <span class="badge bg-info-subtle text-info me-1">TM</span> Turkmen
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-white border-0 px-4 py-2 small" id="ru-tab" data-bs-toggle="tab" data-bs-target="#ru-content" type="button" role="tab" style="border-radius: 8px 8px 0 0;">
                                <span class="badge bg-primary-subtle text-primary me-1">RU</span> Russian
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link text-white border-0 px-4 py-2 small" id="en-tab" data-bs-toggle="tab" data-bs-target="#en-content" type="button" role="tab" style="border-radius: 8px 8px 0 0;">
                                <span class="badge bg-warning-subtle text-warning me-1">EN</span> English
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content bg-dark p-3 rounded-3 border border-secondary" id="langTabsContent">
                        <div class="tab-pane fade show active text-light" id="tm-content" role="tabpanel" aria-labelledby="tm-tab">
                            <h6 class="fw-bold text-info mb-2">{{ $product->name_tm ?: '---' }}</h6>
                            <p class="text-secondary mb-0 style-scroll" style="white-space: pre-line; max-height: 200px; overflow-y: auto;">
                                {{ $product->description_tm ?: 'No description available in Turkmen.' }}
                            </p>
                        </div>
                        <div class="tab-pane fade text-light" id="ru-content" role="tabpanel" aria-labelledby="ru-tab">
                            <h6 class="fw-bold text-info mb-2">{{ $product->name_ru ?: '---' }}</h6>
                            <p class="text-secondary mb-0 style-scroll" style="white-space: pre-line; max-height: 200px; overflow-y: auto;">
                                {{ $product->description_ru ?: 'Нет описания на русском языке.' }}
                            </p>
                        </div>
                        <div class="tab-pane fade text-light" id="en-content" role="tabpanel" aria-labelledby="en-tab">
                            <h6 class="fw-bold text-info mb-2">{{ $product->name ?: '---' }}</h6>
                            <p class="text-secondary mb-0 style-scroll" style="white-space: pre-line; max-height: 200px; overflow-y: auto;">
                                {{ $product->description ?: 'No description available in English.' }}
                            </p>
                        </div>
                    </div>

                    <div class="row g-3 mt-4">
                        <div class="col-sm-6">
                            <div class="p-3 bg-dark rounded-3 d-flex align-items-center border border-secondary">
                                <div class="bg-info bg-opacity-10 text-info p-3 rounded-3 me-3">
                                    <i class="bi bi-eye fs-4"></i>
                                </div>
                                <div>
                                    <span class="text-secondary small d-block">Total Views</span>
                                    <h4 class="text-white fw-bold mb-0">{{ $product->view_count }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="p-3 bg-dark rounded-3 d-flex align-items-center border border-secondary">
                                <div class="bg-danger bg-opacity-10 text-danger p-3 rounded-3 me-3">
                                    <i class="bi bi-heart-fill fs-4"></i>
                                </div>
                                <div>
                                    <span class="text-secondary small d-block">Total Likes</span>
                                    <h4 class="text-white fw-bold mb-0">{{ $product->like_count }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<style>
    .nav-tabs .nav-link {
        background-color: rgba(255, 255, 255, 0.05);
        transition: all 0.2s ease;
    }

    .nav-tabs .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .nav-tabs .nav-link.active {
        background-color: #0ea5e9 !important;
        color: white !important;
    }

    .style-scroll::-webkit-scrollbar {
        width: 6px;
    }

    .style-scroll::-webkit-scrollbar-track {
        background: rgba(0, 0, 0, 0.1);
    }

    .style-scroll::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.2);
        border-radius: 4px;
    }
</style>
@endsection