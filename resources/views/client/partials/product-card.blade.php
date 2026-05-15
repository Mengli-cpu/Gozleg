<div class="card h-100 border-0 shadow-sm custom-card position-relative"
    style="background-color: #1e293b; border-radius: 15px; transition: all 0.3s ease; overflow: hidden;">

    <div style="height: 300px; background-color: #334155;" class="d-flex align-items-center justify-content-center position-relative">
        <img src="{{ ($np->id && file_exists(public_path('img/'.$np->id.'.jpg'))) ? asset('img/'.$np->id.'.jpg') : asset('img/default.jpg') }}"
            alt="{{ $np->name }}"
            class="w-100 h-100 img-fluid object-fit-cover">
        <div class="position-absolute top-0 end-0">
            <div class="bg-success-subtle px-3 py-2 m-2 rounded-3 text-white fw-semibold">{{ $np->category->{'name_' . app()->getLocale()} ?? $np->category->name }}</div>
        </div>
    </div>

    <div class="card-body d-flex flex-column">
        <small class="text-info mb-1">{{ $np->category->{'name_' . app()->getLocale()} ?? $np->name }}</small>
        <h5 class="card-title text-white mb-3" style="font-size: 1.1rem;">{{ $np->{'name_' . app()->getLocale()} ?? $np->name }}</h5>
        <div class="mt-auto">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title text-white mb-3" style="font-size: 1rem;"><i class="bi bi-eye-fill text-info me-2"></i>{{ $np->view_count }}</h5>
                <h5 class="card-title text-white mb-3" style="font-size: 1rem;"><i class="bi bi-heart-fill text-danger me-2"></i>{{ $np->like_count }}</h5>
            </div>
        </div>

        <div class="mt-auto">
            <div class="d-flex justify-content-between align-items-center">
                <span class="h5 mb-0" style="color: #0ea5e9;">
                    {{ number_format($np->price, 2) }} <small>TMT</small>
                </span>

                <a href="{{ route('products.show', $np->id) }}" class="btn btn-sm btn-outline-info rounded-pill px-3 stretched-link main-btn">
                    More
                </a>
            </div>
        </div>
    </div>
</div>