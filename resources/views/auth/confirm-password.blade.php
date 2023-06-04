@extends('layouts.public')
@section('content')

<div class="container mt-5">
    <div class="d-grid gap-2 col-6 mx-auto">
        <div class="mb-4 text-sm text-gray-600">
            {{ __('auth.This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('auth.Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex justify-end mt-4">
                <x-primary-button class="btn btn-primary ml-4 mt-5">
                    {{ __('auth.Confirm') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>

@endsection
