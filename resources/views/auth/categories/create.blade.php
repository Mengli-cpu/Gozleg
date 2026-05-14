@extends('auth.layouts.head')

@section('main-content')
<div class="container-lg mt-4">
    <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="col-lg-5 col-md-8">
            <div class="mb-3">
                <a href="{{ route('auth.categories.index') }}" class="text-decoration-none text-info fw-bold">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
            </div>

            @if ($errors->any())
            <div class="alert alert-danger mb-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('auth.categories.store') }}" method="POST">
                @csrf
                <div class="bg-white rounded-3 border border-2 p-4 shadow-sm">
                    <div class="d-flex flex-column gap-3">
                        <label class="h5 mb-2 fw-bold">Add New Category</label>

                        <div>
                            <input type="text"
                                name="name"
                                value="{{ old('name') }}"
                                class="form-control placeholder-b @error('name') is-invalid @enderror"
                                placeholder="Name"
                                required>
                        </div>

                        <div>
                            <input type="text"
                                name="name_tm"
                                value="{{ old('name_tm') }}"
                                class="form-control placeholder-b @error('name_tm') is-invalid @enderror"
                                placeholder="Name TM">
                        </div>

                        <div>
                            <input type="text"
                                name="name_ru"
                                value="{{ old('name_ru') }}"
                                class="form-control placeholder-b @error('name_ru') is-invalid @enderror"
                                placeholder="Name RU">
                        </div>

                        <button type="submit" class="btn btn-info text-white py-2 fw-bold mt-2">
                            Add New +
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection