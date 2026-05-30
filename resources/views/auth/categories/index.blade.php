@extends('auth.layouts.head')

@section('main-content')
<div class="container-fluid px-4 mt-4 mb-5">
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
                <i class="bi bi-folder2-open me-2 text-info"></i> Categories Management
            </h2>
            <span class="text-secondary small">Total categories: <b class="text-info">{{ $categories->count() }}</b></span>
        </div>
        <a href="{{ route('auth.categories.create') }}" class="btn btn-info text-white fw-bold px-4 shadow-sm" style="border-radius: 10px; background-color: #0ea5e9;">
            <i class="bi bi-plus-lg me-1"></i> Add New Category
        </a>
    </div>

    <div class="card border-0 shadow-lg" style="background-color: #1e293b; border-radius: 15px; overflow: hidden;">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 table-dark">
                <thead style="background-color: rgba(51, 65, 85, 0.5);">
                    <tr>
                        <th class="ps-4 py-3 border-0 text-secondary" style="font-size: 11px; width: 80px;">ID</th>
                        <th class="border-0 text-secondary" style="font-size: 11px;">DEFAULT NAME (EN)</th>
                        <th class="border-0 text-secondary" style="font-size: 11px;">NAME TM</th>
                        <th class="border-0 text-secondary" style="font-size: 11px;">NAME RU</th>
                        <th class="border-0 text-secondary" style="font-size: 11px;">TIMESTAMPS</th>
                        <th class="text-center border-0 pe-4" style="font-size: 11px; width: 140px;">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $c)
                    <tr style="border-bottom: 1px solid rgba(255,255,255,0.05); transition: all 0.2s;" class="table-row-hover position-relative">

                        <td class="ps-4 fw-bold text-secondary" style="font-size: 13px;">
                            <a href="{{ route('auth.categories.show', $c->id) }}" class="stretched-link text-decoration-none text-secondary">
                                #{{ $c->id }}
                            </a>
                        </td>

                        <td>
                            <span class="fw-bold text-white small">{{ $c->name ?: '---' }}</span>
                        </td>

                        <td>
                            <span class="badge bg-info-subtle text-info p-1 me-1" style="font-size: 9px; position: relative; z-index: 2;">TM</span>
                            <span class="text-light small">{{ $c->name_tm ?: '---' }}</span>
                        </td>

                        <td>
                            <span class="badge bg-primary-subtle text-primary p-1 me-1" style="font-size: 9px; position: relative; z-index: 2;">RU</span>
                            <span class="text-light small">{{ $c->name_ru ?: '---' }}</span>
                        </td>

                        <td>
                            <div class="small text-muted" style="font-size: 11px;">
                                <i class="bi bi-calendar-plus me-1 text-info"></i>{{ $c->created_at->format('d.m.Y') }}
                            </div>
                            <div class="small text-muted mt-1" style="font-size: 11px;">
                                <i class="bi bi-calendar-check me-1 text-secondary"></i>{{ $c->updated_at->format('d.m.Y') }}
                            </div>
                        </td>

                        <td class="pe-4 text-center" style="position: relative; z-index: 2;">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('auth.categories.edit', $c->id) }}"
                                    class="btn btn-sm btn-outline-info p-2"
                                    style="border-radius: 8px; width: 35px; height: 35px;">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{ route('auth.categories.destroy', $c->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger p-2"
                                        style="border-radius: 8px; width: 35px; height: 35px;"
                                        onclick="return confirm('Really delete this category and all its links?')">
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
</div>
@endsection