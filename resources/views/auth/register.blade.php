<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | GenzKicks</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f5f7fa;
        }

        .register-card{
            max-width:500px;
            width:100%;
            border:none;
            border-radius:15px;
        }

        .brand-title{
            font-size:2rem;
            font-weight:bold;
            color:#212529;
        }

        .register-btn{
            background:linear-gradient(90deg,#4f46e5,#ec4899);
            border:none;
        }

        .register-btn:hover{
            background:linear-gradient(90deg,#4338ca,#db2777);
        }

        .form-control{
            height:50px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">

        <div class="col-md-7 col-lg-6">

            <div class="card shadow-lg register-card">
                <div class="card-body p-5">

                    <!-- Brand -->
                    <div class="text-center mb-4">
                        <h2 class="brand-title">GenzKicks</h2>
                        <p class="text-muted">
                            Create your account
                        </p>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">
                                Name
                            </label>

                            <input
                                id="name"
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                class="form-control"
                                required
                                autofocus
                                autocomplete="name"
                                placeholder="Enter your full name">

                            @error('name')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">
                                Email Address
                            </label>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="form-control"
                                required
                                autocomplete="username"
                                placeholder="Enter your email">

                            @error('email')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">
                                Password
                            </label>

                            <input
                                id="password"
                                type="password"
                                name="password"
                                class="form-control"
                                required
                                autocomplete="new-password"
                                placeholder="Enter your password">

                            @error('password')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label fw-semibold">
                                Confirm Password
                            </label>

                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                class="form-control"
                                required
                                autocomplete="new-password"
                                placeholder="Confirm your password">

                            @error('password_confirmation')
                                <div class="text-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Register Button -->
                        <button type="submit" class="btn register-btn text-white w-100 py-2">
                            Register
                        </button>

                    </form>

                    <hr class="my-4">

                    <p class="text-center mb-0">
                        Already registered?
                        <a href="{{ route('login') }}" class="text-decoration-none fw-semibold">
                            Sign In
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