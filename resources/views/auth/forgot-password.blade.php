@extends('layouts.public')
@section('content')
    
<div class="container mt-5">
    <div class="d-grid gap-2 col-6 mx-auto">
        <div class="mb-4 text-sm text-gray-600">
            {{ __('auth.Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('auth.Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-2">
                <x-primary-button class="btn btn-primary ml-4 mt-5">
                    {{ __('auth.Password Reset') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>

@endsection
