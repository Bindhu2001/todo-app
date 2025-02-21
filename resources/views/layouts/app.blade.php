<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My To-Do</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="d-flex">
        <div class="vh-100 p-4" style="width: 250px; background: #D8EBFF; color: #0231A9;">
    <h3 class="mb-4">Dashboard</h3>
</div>

        <div class="container mt-5 flex-grow-1">
                    <div class="text-end mb-3">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>

            @yield('content')
        </div>
    </div>
</body>
</html>
