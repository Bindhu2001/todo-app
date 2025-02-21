<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex vh-100 align-items-center justify-content-center bg-primary bg-opacity-10">
    <div class="card shadow-lg p-4" style="width: 24rem; border-radius: 1rem;">
        <h1 class="h4 fw-bold mb-2">Sign up</h1>
        <p class="text-secondary mb-4">Please provide your details</p>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('signup') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" class="form-control" value="{{ old('name') }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" class="form-control" value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Sign up</button>
        </form>
        <p class="text-center text-secondary mt-3">Already have an account? 
            <a href="{{ route('login.form') }}" class="text-primary">Log in</a>
        </p>
    </div>
</body>
</html>
