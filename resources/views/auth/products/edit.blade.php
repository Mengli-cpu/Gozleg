@extends('auth.layouts.head')

@section('main-content')
<div class="container-lg mt-4 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">

            <div class="mb-3">
                <a href="{{ route('auth.products.index') }}" class="text-decoration-none text-info fw-bold">
                    <i class="bi bi-arrow-left"></i> Back to Products
                </a>
            </div>

            @if ($errors->any())
            <div class="alert alert-danger shadow-sm border-0 rounded-3 mb-3 text-white" style="background-color: #ef4444;">
                <ul class="mb-0 small">
                    @foreach ($errors->all() as $error)
                    <li><i class="bi bi-exclamation-circle me-1"></i> {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('auth.products.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="bg-white rounded-4 border-0 p-4 shadow-lg">
                    <h4 class="fw-bold text-dark mb-4 text-center">
                        Edit Product: <span class="text-info">{{ $product->name }}</span>
                    </h4>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="fw-bold text-secondary mb-1">Category</label>
                            <select name="category_id" class="form-select placeholder-b @error('category_id') is-invalid @enderror" required>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="fw-bold text-secondary mb-1">Shop Name</label>
                            <input type="text" name="shop" value="{{ old('shop', $product->shop) }}" class="form-control placeholder-b" placeholder="e.g. LC Waikiki">
                        </div>

                        <div class="col-md-4">
                            <label class="fw-bold text-secondary mb-1">Name (EN)</label>
                            <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control placeholder-b @error('name') is-invalid @enderror" required>
                        </div>

                        <div class="col-md-4">
                            <label class="fw-bold text-secondary mb-1">Name (TM)</label>
                            <input type="text" name="name_tm" value="{{ old('name_tm', $product->name_tm) }}" class="form-control placeholder-b @error('name_tm') is-invalid @enderror">
                        </div>

                        <div class="col-md-4">
                            <label class="fw-bold text-secondary mb-1">Name (RU)</label>
                            <input type="text" name="name_ru" value="{{ old('name_ru', $product->name_ru) }}" class="form-control placeholder-b @error('name_ru') is-invalid @enderror">
                        </div>

                        <div class="col-md-4">
                            <label class="fw-bold text-secondary mb-1">Description (EN)</label>
                            <textarea name="description" class="form-control placeholder-b" rows="3">{{ old('description', $product->description) }}</textarea>
                        </div>

                        <div class="col-md-4">
                            <label class="fw-bold text-secondary mb-1">Description (TM)</label>
                            <textarea name="description_tm" class="form-control placeholder-b" rows="3">{{ old('description_tm', $product->description_tm) }}</textarea>
                        </div>

                        <div class="col-md-4">
                            <label class="fw-bold text-secondary mb-1">Description (RU)</label>
                            <textarea name="description_ru" class="form-control placeholder-b" rows="3">{{ old('description_ru', $product->description_ru) }}</textarea>
                        </div>

                        <div class="col-md-6">
                            <label class="fw-bold text-secondary mb-1">Price (TMT)</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light text-dark">TMT</span>
                                <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" class="form-control placeholder-b @error('price') is-invalid @enderror" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="fw-bold text-secondary mb-1">Stock Amount</label>
                            <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" class="form-control placeholder-b @error('stock') is-invalid @enderror" required>
                        </div>

                        <div class="col-12 mt-4 text-center">
                            <button type="submit" class="btn btn-info text-white px-5 py-2 fw-bold shadow-sm" style="border-radius: 10px;">
                                <i class="bi bi-check-lg me-1"></i> Update Product Info
                            </button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection