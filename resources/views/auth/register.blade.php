@extends('layouts.login')
@section('content')
<img src="{{ asset('images/alitas.png') }}" alt="Logo Alitas Mary" class="logo position-absolute top-3 start-50 translate-middle mt-1"">

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" :value="__('Name')" class="text">Nombre</label>
                <div>
                    <input id="name" class="block mt-1 w-100" type="text" name="name" :value="old('name')" required autofocus />
                </div>
            </div>

            <div class="mt-4">
                <label for="direccion" :value="__('Direccion')" class="text">Dirección</label>
                <div>
                    <input id="direccion" class="block mt-1 w-100" type="text" name="direccion" :value="old('direccion')" required autofocus />
                </div>
            </div>


            <!-- Email Address -->
            <div class="mt-4">
                    <label for="email" :value="__('Email')" class="text">Email</label>
                    <div>
                        <input id="email" class="block mt-1 w-100" type="email" name="email" :value="old('email')" required>
                    </div>
            </div>


            <!-- Password -->
            <div class="mt-4">
                <label for="password" :value="__('Password')" class="text">Contraseña</label>
                <div>
                    <input id="password" class="block mt-1 w-100"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation" :value="__('Confirm Password')" class="text">Confirmar la contraseña</label>

                <input id="password_confirmation" class="block mt-1 w-100"
                                type="password"
                                name="password_confirmation" required />
            </div>
            <div class="mt-3">
                <button class="btn btn-outline-dark ml-4 w-100" id="btn">
                    {{ __('Register') }}
                </button>
            </div>
            <div class="flex items-center position-absolute bottom-0 end-0 mt-2">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>
        </form>
@endsection
