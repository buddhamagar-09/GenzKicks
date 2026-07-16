<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | GenzKicks</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: #f5f7fa;
        }

        .login-card{
            max-width: 450px;
            width: 100%;
            border: none;
            border-radius: 15px;
        }

        .brand-title{
            font-size: 2rem;
            font-weight: bold;
            color: #212529;
        }

        .login-btn{
            background: linear-gradient(90deg,#4f46e5,#ec4899);
            border: none;
        }

        .login-btn:hover{
            background: linear-gradient(90deg,#4338ca,#db2777);
        }

        .form-control{
            height: 50px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">

        <div class="col-md-6 col-lg-5">

            <div class="card shadow-lg login-card">
                <div class="card-body p-5">

                    <!-- Brand -->
                    <div class="text-center mb-4">
                        <h2 class="brand-title">GenzKicks</h2>
                        <p class="text-muted">
                            Sign in to access your account
                        </p>
                    </div>

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Email Address
                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="form-control"
                                placeholder="Enter your email"
                                required
                                autocomplete="username">

                            @error('email')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Password
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="Enter your password"
                                required
                                autocomplete="current-password">

                            @error('password')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Remember & Forgot -->
                        <div class="d-flex justify-content-between align-items-center mb-4">

                            <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="remember"
                                    id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    Remember me
                                </label>
                            </div>

                            @if(Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-decoration-none">
                                    Forgot Password?
                                </a>
                            @endif

                        </div>

                        <!-- Button -->
                        <button class="btn login-btn text-white w-100 py-2">
                            Sign In
                        </button>

                    </form>

                    <hr class="my-4">

                    <p class="text-center mb-0">
                        Don't have an account?
                        <a href="{{ route('register') }}" class="text-decoration-none fw-semibold">
                            Create one
                        </a>
                    </p>

                </div>
            </div>

        </div>

    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>