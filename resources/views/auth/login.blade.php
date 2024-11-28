<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
            <div class="flex items-center justify-center mt-4">
                <p class="text-sm text-gray-600">Don't have an account?
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                        {{ __('Sign up') }}
                    </a>
                </p>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patient Login</title>
  <link rel="stylesheet" href="style.css">
  <style>
    /* style.css */

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: Arial, sans-serif;
}

body {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: #f4f7fc;
}

.login-container {
  background-color: #fff;
  padding: 2rem;
  border-radius: 8px;
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
  max-width: 400px;
  width: 100%;
  text-align: center;
}

h2 {
  margin-bottom: 1.5rem;
  color: #333;
}

.input-group {
  margin-bottom: 1rem;
  position: relative;
  text-align: left;
}

label {
  display: block;
  font-size: 0.9rem;
  color: #555;
}

input[type="text"],
input[type="password"] {
  width: 100%;
  padding: 0.8rem;
  margin-top: 0.5rem;
  border: 1px solid #ccc;
  border-radius: 4px;
  font-size: 1rem;
}

.show-password {
  position: absolute;
  right: 10px;
  top: 50%;
  transform: translateY(-50%);
  cursor: pointer;
  font-size: 1rem;
}

.options {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 1rem;
}

.forgot-password {
  font-size: 0.85rem;
  color: #007bff;
  text-decoration: none;
}

.forgot-password:hover {
  text-decoration: underline;
}

.login-button {
  width: 100%;
  padding: 0.8rem;
  background-color: #007bff;
  color: #fff;
  font-size: 1rem;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.login-button:hover {
  background-color: #0056b3;
}

.signup-link {
  margin-top: 1rem;
  font-size: 0.9rem;
}

.signup-link a {
  color: #007bff;
  text-decoration: none;
}

.signup-link a:hover {
  text-decoration: underline;
}

.social-login {
  margin-top: 1rem;
  font-size: 0.9rem;
}

.social-login p {
  margin-bottom: 0.5rem;
}

.google-login,
.facebook-login {
  width: 100%;
  padding: 0.7rem;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-top: 0.5rem;
  font-size: 1rem;
}

.google-login {
  background-color: #db4437;
  color: #fff;
}

.facebook-login {
  background-color: #4267B2;
  color: #fff;
}

.google-login:hover {
  background-color: #c23321;
}

.facebook-login:hover {
  background-color: #365899;
}

  </style>
</head>
<body>
  <div class="login-container">
    <h2>Patient Login</h2>
    <form class="login-form" method="POST" action="{{ route('login') }}">
        @csrf
      <div class="input-group">
        <label for="email">Email or Username</label>
        <input type="text" id="email" name="email" required>
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <span class="show-password" onclick="togglePassword()">👁️</span>
      </div>
      <div class="options">
        <label>
          <input type="checkbox" name="remember"> Remember Me
        </label>
        <a href="#" class="forgot-password">Forgot Password?</a>
      </div>
      <button type="submit" class="login-button">Login</button>
      <p class="signup-link">New here? <a href="#">Create an account</a></p>
      <div class="social-login">
        <p>Or login with:</p>
        <button class="google-login">Google</button>
        <button class="facebook-login">Facebook</button>
      </div>
    </form>
  </div>

  <script>
    function togglePassword() {
      const passwordField = document.getElementById("password");
      const type = passwordField.type === "password" ? "text" : "password";
      passwordField.type = type;
    }
  </script>
</body>
</html> --}}
