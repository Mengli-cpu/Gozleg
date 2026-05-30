@extends('auth.layouts.head')

@section('main-content')
<div class="container-fluid px-4 mt-4 mb-5">
    <div class="mb-3">
        <a href="{{ route('auth.categories.index') }}" class="text-decoration-none text-info fw-bold">
            <i class="bi bi-arrow-left"></i> Back to Categories Management
        </a>
    </div>

    <div class="card border-0 shadow-lg mb-4" style="background-color: #1e293b; border-radius: 15px;">
        <div class="card-body p-4">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                <div>
                    <span class="text-secondary small">Category #{{ $category->id }}</span>
                    <h2 class="text-white fw-bold mb-1">
                        <i class="bi bi-folder2-open me-2 text-info"></i>
                        {{ $category->name_ru ?: $category->name_tm ?: $category->name ?: 'Category Details' }}
                    </h2>

                    <div class="d-flex flex-wrap gap-3 text-secondary small mt-2">
                        <span><b class="text-info">TM:</b> {{ $category->name_tm ?: '---' }}</span>
                        <span><b class="text-primary">RU:</b> {{ $category->name_ru ?: '---' }}</span>
                        <span><b class="text-warning">EN:</b> {{ $category->name ?: '---' }}</span>
                    </div>
                </div>

                <div class="bg-dark px-4 py-3 rounded-3 border border-secondary text-center" style="min-width: 180px;">
                    <span class="text-secondary small d-block mb-1">Total Products</span>
                    <h3 class="text-info fw-bold mb-0">{{ $products->total() }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5 mb-3">
        <h4 class="text-white fw-bold mb-0">
            <i class="bi bi-box-seam me-2 text-info"></i> Products in this Category
        </h4>
        <span class="text-secondary small">Below are all items linked to this category</span>
    </div>

    <div class="card border-0 shadow-lg" style="background-color: #1e293b; border-radius: 15px; overflow: hidden;">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 table-dark">
                <thead style="background-color: rgba(51, 65, 85, 0.5);">
                    <tr>
                        <th class="ps-4 py-3 border-0 text-secondary" style="font-size: 11px; width: 80px;">IMAGE & ID</th>
                        <th class="border-0 text-secondary" style="font-size: 11px;">CONTENT (TM / RU / EN)</th>
                        <th class="border-0 text-secondary" style="font-size: 11px;">SHOP</th>
                        <th class="border-0 text-secondary" style="font-size: 11px;">PRICE & STOCK</th>
                        <th class="border-0 text-secondary" style="font-size: 11px;">STATS</th>
                        <th class="text-center border-0 pe-4" style="font-size: 11px; width: 120px;">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $p)
                    <tr style="border-bottom: 1px solid rgba(255,255,255,0.05); transition: all 0.2s; cursor: pointer;" class="position-relative table-row-hover">

                        <td class="ps-4">
                            <div class="position-relative" style="width: 50px; height: 50px;">
                                <img src="{{ asset($p->img ? 'storage/' . $p->img : 'img/default.jpg') }}"
                                    class="rounded-3 w-100 h-100 object-fit-cover shadow-sm border border-secondary"
                                    alt="Product Image">
                            </div>
                            <div class="text-muted mt-1" style="font-size: 10px;">#{{ $p->id }}</div>
                        </td>

                        <td style="min-width: 300px;">
                            <div class="mb-2">
                                <span class="badge bg-info-subtle text-info p-1 me-1" style="font-size: 9px; min-width: 20px;">TM</span>
                                <a href="{{ route('auth.products.show', $p->id) }}" class="fw-bold text-white small text-decoration-none stretched-link">
                                    {{ $p->name_tm ?: '---' }}
                                </a>
                                <div class="text-muted text-truncate" style="font-size: 11px; padding-left: 28px; max-width: 250px;">
                                    {{ $p->description_tm ?: 'No description' }}
                                </div>
                            </div>
                            <div class="mb-2">
                                <span class="badge bg-primary-subtle text-primary p-1 me-1" style="font-size: 9px; min-width: 20px;">RU</span>
                                <span class="fw-bold text-white small">{{ $p->name_ru ?: '---' }}</span>
                                <div class="text-muted text-truncate" style="font-size: 11px; padding-left: 28px; max-width: 250px;">
                                    {{ $p->description_ru ?: 'Нет описания' }}
                                </div>
                            </div>
                            <div>
                                <span class="badge bg-warning-subtle text-warning p-1 me-1" style="font-size: 9px; min-width: 20px;">EN</span>
                                <span class="fw-bold text-white small">{{ $p->name ?: '---' }}</span>
                                <div class="text-muted text-truncate" style="font-size: 11px; padding-left: 28px; max-width: 250px;">
                                    {{ $p->description ?: 'No description' }}
                                </div>
                            </div>
                        </td>

                        <td>
                            <div class="badge rounded-pill bg-dark border border-secondary fw-normal px-3 mb-1 d-block w-fit">
                                <i class="bi bi-shop me-1 text-info"></i> {{ $p->shop }}
                            </div>
                            <small class="text-secondary ps-2">{{ $p->category->name_ru ?? 'No Category' }}</small>
                        </td>

                        <td>
                            <div class="text-info fw-bold fs-6">{{ number_format($p->price, 2) }} <small>TMT</small></div>
                            <div class="small {{ $p->stock < 5 ? 'text-danger fw-bold' : 'text-muted' }}">
                                <i class="bi bi-box me-1"></i>{{ $p->stock }} items
                            </div>
                        </td>

                        <td>
                            <div class="small text-muted mb-1"><i class="bi bi-eye me-1 text-info"></i>{{ $p->view_count }}</div>
                            <div class="small text-muted"><i class="bi bi-heart-fill me-1 text-danger"></i>{{ $p->like_count }}</div>
                        </td>

                        <td class="pe-4 text-center" style="position: relative; z-index: 5;">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('auth.products.edit', $p->id) }}" class="btn btn-sm btn-outline-info p-2" style="border-radius: 8px; width: 35px; height: 35px;">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('auth.products.destroy', $p->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger p-2"
                                        style="border-radius: 8px; width: 35px; height: 35px;"
                                        onclick="return confirm('Really delete this product?')">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-secondary">
                            <i class="bi bi-folder-x fs-2 d-block mb-2 text-muted"></i>
                            No products found in this category.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-4">
        <div class="custom-pagination">
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection