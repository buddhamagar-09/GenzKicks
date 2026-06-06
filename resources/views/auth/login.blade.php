<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-6 sm:py-10 px-4 sm:px-6 lg:px-8">

        <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-6 sm:p-8">

            <!-- Logo -->
            <a href="{{ url('/') }}" class="inline-flex items-center mb-6">
                <span class="ml-3 text-xl sm:text-2xl font-extrabold text-gray-800">
                    GenzKicks
                </span>
            </a>

            <!-- Heading -->
            <h2 class="text-xl sm:text-2xl font-semibold text-gray-800">
                Welcome back
            </h2>

            <p class="text-sm text-gray-500 mb-6">
                Sign in to access your account and discover the latest drops.
            </p>

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-4 sm:space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>

                    <input
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="username"
                        class="mt-1 w-full rounded-md border border-gray-200 px-3 py-2 sm:py-3
                        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    />

                    @error('email')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Password</label>

                    <input
                        id="password"
                        name="password"
                        type="password"
                        required
                        autocomplete="current-password"
                        class="mt-1 w-full rounded-md border border-gray-200 px-3 py-2 sm:py-3
                        focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    />

                    @error('password')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember + Forgot -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">

                    <label class="flex items-center">
                        <input type="checkbox"
                               name="remember"
                               class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                               {{ old('remember') ? 'checked' : '' }}>
                        <span class="ml-2 text-sm text-gray-600">Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           class="text-sm text-indigo-600 hover:underline">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <!-- Button -->
                <button
                    type="submit"
                    class="w-full py-2.5 sm:py-3 rounded-md text-white font-medium
                    bg-gradient-to-r from-indigo-600 to-pink-500
                    hover:from-indigo-700 hover:to-pink-600 transition"
                >
                    Sign in
                </button>
            </form>

            <!-- Register -->
            <p class="text-center text-sm text-gray-500 mt-6">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">
                    Create one
                </a>
            </p>

        </div>
    </div>
</x-guest-layout>