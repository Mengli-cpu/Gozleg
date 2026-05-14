@extends('auth.layouts.head')
@section('main-content')
<div class="container-lg vh-100 justify-content-center">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3 border-0" role="alert" style="background-color: #10b981; color: white;">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="d-flex justify-content-between mb-3 mt-4">
        <div class="h3 text-white">
            Category
        </div>
        <a href="{{ route('auth.categories.create') }}" class="btn btn-primary">Add new +</a>
    </div>
    <table class="table table-hover h5 table-striped table-dark rounded-3">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Name TM</th>
                <th scope="col">Name RU</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $c)
            <tr>
                <th scope="row">{{ $c->id }}</th>
                <td>{{ $c->name }}</td>
                <td>{{ $c->name_tm }}</td>
                <td>{{ $c->name_ru }}</td>
                <td>{{ $c->created_at->format('d.m.Y') }}</td>
                <td>{{ $c->updated_at->format('d.m.Y') }}</td>
                <td>
                    <a href="{{ route('auth.categories.edit', $c->id) }}" class="btn btn-sm btn-warning"><i class="bi-pencil h5"></i></a>
                    <form action="{{ route('auth.categories.destroy', $c->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this category?')">
                            Delete
                        </button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection