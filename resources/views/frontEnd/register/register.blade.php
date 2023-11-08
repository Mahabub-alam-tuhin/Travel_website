@extends('frontEnd.master')

@section('title')
    login
@endsection

@section('content')
<div class="container-fluid bg-registration py-5" style="margin: 90px 0;">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-7 mb-5 mb-lg-0">
                @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
    
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div style="margin-bottom: 4rem;">
                    <h6 style="color: #007bff; letter-spacing: 5px;" class="text-uppercase">Mega Offer</h6>
                    <h1 style="color: #fff;">30% OFF For Honeymoon</h1>
                </div>
                <p style="color: #fff;">Invidunt lorem justo sanctus clita. Erat lorem labore ea, justo dolor lorem
                    ipsum ut sed eos,
                    ipsum et dolor kasd sit ea justo. Erat justo sed sed diam. Ea et erat ut sed diam sea ipsum est
                    dolor</p>
                <ul class="list-inline text-white m-0">
                    <li class="py-2"><i style="color: #007bff;" class="fa fa-check mr-3"></i>Labore eos amet dolor amet diam</li>
                    <li class="py-2"><i style="color: #007bff;" class="fa fa-check mr-3"></i>Etsea et sit dolor amet ipsum</li>
                    <li class="py-2"><i style="color: #007bff;" class="fa fa-check mr-3"></i>Diam dolor diam elitripsum vero.</li>
                </ul>
            </div>
            <div class="col-lg-5">
                <div class="card border-0">
                    <div class="card-header bg-primary text-center p-4">
                        <h1 style="color: #fff;">Login Now</h1>
                    </div>
                    <div class="card-body rounded-bottom bg-white p-5">
                        <div>
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus style="width: 100%;" />
                        </div>
            
                        <div class="mt-4">
                            <x-jet-label for="password" value="{{ __('Password') }}" />
                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" style="width: 100%;" />
                        </div>
            
                        <div class="block mt-4">
                            <label for="remember_me" class="flex items-center">
                                <x-jet-checkbox id="remember_me" name="remember" />
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
            
                            <x-jet-button class="ml-4" style="background: #007bff; border-radius: 50px;">
                                {{ __('Log in') }}
                            </x-jet-button>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
