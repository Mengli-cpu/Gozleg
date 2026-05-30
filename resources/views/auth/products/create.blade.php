@extends('auth.layouts.head')

@section('main-content')
<div class="container-lg mt-4 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            
            <div class="mb-3 text-start">
                <a href="{{ route('auth.products.index') }}" class="text-decoration-none text-info fw-bold">
                    <i class="bi bi-arrow-left"></i> Back to Products
                </a>
            </div>

            @if ($errors->any())
            <div class="alert alert-danger shadow-sm border-0 rounded-3 mb-3 text-white" style="background-color: #ef4444;">
                <ul class="mb-0 small p-2">
                    @foreach ($errors->all() as $error)
                    <li><i class="bi bi-exclamation-circle me-1"></i> {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('auth.products.store') }}" method="POST"  enctype="multipart/form-data">
                @csrf

                <div class="bg-white rounded-4 border-0 p-4 shadow-lg text-start">
                    <h4 class="fw-bold text-dark mb-4 text-center">
                        <i class="bi bi-plus-circle me-2 text-info"></i> Add New Product
                    </h4>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="small fw-bold text-secondary mb-1">Category <span class="text-danger">*</span></label>
                            <select name="category_id" class="form-select placeholder-b @error('category_id') is-invalid @enderror" required>
                                <option value="" selected disabled>Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="small fw-bold text-secondary mb-1">Shop Name</label>
                            <input type="text" name="shop" value="{{ old('shop') }}" class="form-control placeholder-b" placeholder="Shop name">
                        </div>

                        <div class="col-md-4">
                            <label class="small fw-bold text-secondary mb-1">Product Name (EN) <span class="text-danger">*</span></label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control placeholder-b @error('name') is-invalid @enderror" placeholder="English name" required>
                        </div>

                        <div class="col-md-4">
                            <label class="small fw-bold text-secondary mb-1">Name (TM)</label>
                            <input type="text" name="name_tm" value="{{ old('name_tm') }}" class="form-control placeholder-b" placeholder="Ady">
                        </div>

                        <div class="col-md-4">
                            <label class="small fw-bold text-secondary mb-1">Name (RU)</label>
                            <input type="text" name="name_ru" value="{{ old('name_ru') }}" class="form-control placeholder-b" placeholder="Русское название">
                        </div>

                        <div class="col-md-4">
                            <label class="small fw-bold text-secondary mb-1">Description (EN)</label>
                            <textarea name="description" class="form-control placeholder-b" rows="3" placeholder="English details...">{{ old('description') }}</textarea>
                        </div>

                        <div class="col-md-4">
                            <label class="small fw-bold text-secondary mb-1">Description (TM)</label>
                            <textarea name="description_tm" class="form-control placeholder-b" rows="3" placeholder="TM jikme-jiklikler...">{{ old('description_tm') }}</textarea>
                        </div>

                        <div class="col-md-4">
                            <label class="small fw-bold text-secondary mb-1">Description (RU)</label>
                            <textarea name="description_ru" class="form-control placeholder-b" rows="3" placeholder="Описание на русском...">{{ old('description_ru') }}</textarea>
                        </div>
                        <div class="w-100">
                            <label class="small fw-bold text-secondary mb-1">Image</label>
                            <input name="img" type="file" class="form-control placeholder-b" rows="3" placeholder="Image">
                        </div>

                        <div class="col-md-6">
                            <label class="small fw-bold text-secondary mb-1">Price (TMT) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light fw-bold">TMT</span>
                                <input type="number" step="0.01" name="price" value="{{ old('price') }}" class="form-control placeholder-b @error('price') is-invalid @enderror" placeholder="0.00" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="small fw-bold text-secondary mb-1">Stock Amount <span class="text-danger">*</span></label>
                            <input type="number" name="stock" value="{{ old('stock', 0) }}" class="form-control placeholder-b @error('stock') is-invalid @enderror" placeholder="Quantity" required>
                        </div>

                        <div class="col-12 mt-4 text-center">
                            <button type="submit" class="btn btn-info text-white px-5 py-2 fw-bold shadow-sm" style="border-radius: 10px;">
                                <i class="bi bi-plus-lg me-1"></i> Create Product
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection