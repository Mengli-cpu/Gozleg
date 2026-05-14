@extends('auth.layouts.head')

@section('main-content')
<div class="container-fluid px-4 mt-4">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert" style="background-color: #10b981; color: white; border-radius: 12px;">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="text-white fw-bold mb-0">
                <i class="bi bi-box-seam me-2 text-info"></i> Products
            </h2>
            <span class="text-secondary small">Total items in database: <b>{{ $products->total() }}</b></span>
        </div>
        <a href="{{ route('auth.products.create') }}" class="btn btn-info text-white fw-bold px-4 shadow-sm" style="border-radius: 10px;">
            <i class="bi bi-plus-lg me-1"></i> Add New
        </a>
    </div>

    <div class="card bg-dark border-0 shadow-lg" style="border-radius: 15px; overflow: hidden;">
        <div class="table-responsive">
            <table class="table table-dark table-hover align-middle mb-0">
                <thead class="bg-secondary bg-opacity-10 text-secondary">
                    <tr>
                        <th class="ps-4 py-3 border-0" style="font-size: 12px;">ID</th>
                        <th class="border-0" style="font-size: 12px;">PRODUCT INFO</th>
                        <th class="border-0" style="font-size: 12px;">LANGUAGES</th>
                        <th class="border-0" style="font-size: 12px;">SHOP</th>
                        <th class="border-0" style="font-size: 12px;">PRICE & STOCK</th>
                        <th class="border-0" style="font-size: 12px;">STATS</th>
                        <th class="text-center border-0 pe-4" style="font-size: 12px;">ACTIONS</th>
                    </tr>
                </thead>
                <tbody style="border-top: none;">
                    @foreach ($products as $p)
                    <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                        <td class="ps-4 text-muted small">#{{ $p->id }}</td>
                        <td>
                            <div class="fw-bold text-white">{{ $p->name }}</div>
                            <div class="text-muted small text-truncate" style="max-width: 180px;">{{ $p->description }}</div>
                        </td>
                        <td>
                            <div style="font-size: 11px;"><b class="text-info">TM:</b> {{ Str::limit($p->name_tm, 15) }}</div>
                            <div style="font-size: 11px;"><b class="text-info">RU:</b> {{ Str::limit($p->name_ru, 15) }}</div>
                        </td>
                        <td>
                            <span class="badge rounded-pill bg-dark border border-secondary fw-normal px-3">{{ $p->shop }}</span>
                        </td>
                        <td>
                            <div class="text-info fw-bold">{{ number_format($p->price, 2) }} <small>TMT</small></div>
                            <div class="small {{ $p->stock < 5 ? 'text-danger' : 'text-muted' }}">
                                <i class="bi bi-archive me-1"></i>{{ $p->stock }} pcs
                            </div>
                        </td>
                        <td>
                            <div class="small text-muted"><i class="bi bi-eye me-1"></i>{{ $p->view_count }}</div>
                            <div class="small text-muted"><i class="bi bi-heart-fill me-1 text-danger" style="font-size: 10px;"></i>{{ $p->like_count }}</div>
                        </td>
                        <td class="pe-4">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('auth.products.edit', $p->id) }}" class="btn btn-sm btn-outline-info" style="border-radius: 8px;">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('auth.products.destroy', $p->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" style="border-radius: 8px;" onclick="return confirm('Delete?')">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-4 mb-5">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection