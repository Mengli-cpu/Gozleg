<div class="col-6 col-md-4 col-lg-3 mb-4">
    <div class="card h-100 border-0 shadow-sm custom-card position-relative"
        style="background-color: #1e293b; border-radius: 15px; transition: all 0.3s ease; overflow: hidden;">

        <div style="height: 300px; background-color: #334155;" class="d-flex align-items-center justify-content-center">
            @if ($np->id && file_exists(public_path("img/{$np->id}.jpg")))
            <img src="{{ ($np->id && file_exists(public_path('img/'.$np->id.'.jpg'))) ? asset('img/'.$np->id.'.jpg') : asset('img/default.jpg') }}"
                alt="{{ $np->name }}"
                class="w-100 h-100 img-fluid object-fit-cover"> @else
            <i class="bi bi-image text-secondary" style="font-size: 3rem;"></i>
            @endif
        </div>

        <div class="card-body d-flex flex-column">
            <small class="text-info mb-1">{{ $np->category->name }}</small>
            <h5 class="card-title text-white mb-3" style="font-size: 1.1rem;">{{ $np->name }}</h5>

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
</div>