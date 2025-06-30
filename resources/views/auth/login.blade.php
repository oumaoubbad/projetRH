@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="col-md-6">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-primary text-white text-center fw-bold fs-4">
                {{ __('Se connecter') }}
            </div>

            <div class="card-body px-5 py-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- Email --}}
                    <div class="mb-4">
                        <label for="email" class="form-label fw-semibold">{{ __('Adresse Email') }}</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-envelope"></i></span>
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- Mot de passe --}}
                    <div class="mb-4">
                        <label for="password" class="form-label fw-semibold">{{ __('Mot de passe') }}</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-lock"></i></span>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password" required autocomplete="current-password">
                        </div>

                        @error('password')
                            <span class="invalid-feedback d-block">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" id="showPassword" onclick="togglePassword()">
                            <label class="form-check-label" for="showPassword">
                                {{ __('Afficher le mot de passe') }}
                            </label>
                        </div>
                    </div>

                    {{-- Se souvenir --}}
                    <div class="mb-3 form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Se souvenir de moi') }}
                        </label>
                    </div>

                    {{-- Bouton de connexion --}}
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary rounded-pill py-2">
                            {{ __('Connexion') }}
                        </button>
                    </div>

                    {{-- Mot de passe oublié --}}
                    @if (Route::has('password.request'))
                        <div class="text-center mt-3">
                            <a class="text-decoration-none" href="{{ route('password.request') }}">
                                {{ __('Mot de passe oublié ?') }}
                            </a>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Script afficher le mot de passe --}}
<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
    }
</script>

{{-- Ajoute FontAwesome si ce n’est pas encore fait --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
@endsection
