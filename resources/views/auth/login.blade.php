
<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 px-4">

        <div class="w-full max-w-md bg-white rounded-xl shadow-lg p-8">

            <!-- Brand -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800">
                    GenzKicks
                </h1>

                <p class="mt-2 text-sm text-gray-500">
                    Sign in to access your account
                </p>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <label
                        for="email"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        Email Address
                    </label>

                    <input
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="username"
                        placeholder="Enter your email"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500"
                    >

                    @error('email')
                        <p class="text-sm text-red-600 mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label
                        for="password"
                        class="block text-sm font-medium text-gray-700 mb-2"
                    >
                        Password
                    </label>

                    <input
                        id="password"
                        name="password"
                        type="password"
                        required
                        autocomplete="current-password"
                        placeholder="Enter your password"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500"
                    >

                    @error('password')
                        <p class="text-sm text-red-600 mt-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Remember + Forgot -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center text-sm text-gray-600">
                        <input
                            type="checkbox"
                            name="remember"
                            class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                            {{ old('remember') ? 'checked' : '' }}
                        >
                        <span class="ml-2">Remember me</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a
                            href="{{ route('password.request') }}"
                            class="text-sm text-indigo-600 hover:underline"
                        >
                            Forgot password?
                        </a>
                    @endif
                </div>

                <!-- Login Button -->
                <button
                    type="submit"
                    class="w-full bg-gradient-to-r from-indigo-600 to-pink-500 text-white py-3 rounded-lg font-medium hover:from-indigo-700 hover:to-pink-600 transition"
                >
                    Sign In
                </button>
            </form>

            <!-- Divider -->
            <div class="border-t border-gray-200 mt-8 pt-6">
                <p class="text-center text-sm text-gray-500">
                    Don't have an account?
                    <a
                        href="{{ route('register') }}"
                        class="text-indigo-600 font-medium hover:underline"
                    >
                        Create one
                    </a>
                </p>
            </div>

        </div>

    </div>
</x-guest-layout>

