<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body class="bg-dark"> <div class="container-lg mt-4">
        <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
            <div class="col-lg-5 col-md-8">

                @if ($errors->any())
                    <div class="alert alert-danger mb-3">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <div class="bg-white rounded-3 border border-2 p-4 shadow-sm">
                        <div class="d-flex flex-column gap-3">
                            <label class="h5 mb-0 text-dark">Admin Panele</label>

                            <div class="form-group">
                                <input type="text"
                                       name="username"
                                       class="form-control"
                                       placeholder="Username"
                                       value="{{ old('username') }}"
                                       required>
                            </div>

                            <div class="form-group">
                                <input type="password"
                                       name="password"
                                       class="form-control"
                                       placeholder="Password"
                                       required>
                            </div>

                            <button type="submit" class="btn btn-primary py-2 w-100">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>