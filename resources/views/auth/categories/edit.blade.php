@extends('auth.layouts.head')

@section('main-content')
<div class="container-lg mt-4">
    <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-lg-5 col-md-8">
            
            <div class="mb-3">
                <a href="{{ route('auth.categories.index') }}" class="text-decoration-none text-info fw-bold">
                    <i class="bi bi-arrow-left"></i> Back to Categories
                </a>
            </div>

            <form action="{{ route('auth.categories.update', $category) }}" method="POST">
                @csrf
                @method('PUT') <div class="bg-white rounded-3 border border-2 p-4 shadow-sm">
                    <div class="d-flex flex-column gap-3">
                        <label class="h5 mb-2 fw-bold text-dark">Edit Category: <span class="text-info">{{ $category->name }}</span></label>

                        <div>
                            <label class="small fw-bold text-secondary mb-1">System Name</label>
                            <input type="text"
                                name="name"
                                class="form-control placeholder-b"
                                value="{{ old('name', $category->name) }}"
                                placeholder="Name"
                                required>
                        </div>

                        <div>
                            <label class="small fw-bold text-secondary mb-1">Turkmen Name</label>
                            <input type="text"
                                name="name_tm"
                                class="form-control placeholder-b"
                                value="{{ old('name_tm', $category->name_tm) }}"
                                placeholder="Name TM"
                                required>
                        </div>

                        <div>
                            <label class="small fw-bold text-secondary mb-1">Russian Name</label>
                            <input type="text"
                                name="name_ru"
                                class="form-control placeholder-b"
                                value="{{ old('name_ru', $category->name_ru) }}"
                                placeholder="Name RU"
                                required>
                        </div>

                        <button type="submit" class="btn btn-info text-white py-2 fw-bold mt-2 shadow-sm">
                            <i class="bi bi-check-lg"></i> Update Category
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection