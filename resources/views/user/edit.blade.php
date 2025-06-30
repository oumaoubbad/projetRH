@extends('layouts.master')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center g-4">

        <!-- Formulaire modification utilisateur -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center rounded-top">
                    <h4 class="mb-0">Modifier Utilisateur</h4>
                </div>
                <div class="card-body px-4 py-4">
                    <form method="POST" action="{{ route('user.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Nom & Prénom</label>
                            <input type="text" name="name" id="name"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Adresse Email</label>
                            <input type="email" name="email" id="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">Rôle</label>
                            <select name="role" id="role" class="form-select">
                                <option disabled selected>Choisir un rôle</option>
                                <option value="1" {{ $user->role === 1 ? 'selected' : '' }}>Admin</option>
                                <option value="0" {{ $user->role === 0 ? 'selected' : '' }}>User</option>
                            </select>
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('user.index') }}" class="btn btn-secondary me-2">Annuler</a>
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Formulaire changement de mot de passe -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center rounded-top">
                    <h4 class="mb-0">Changer le mot de passe</h4>
                </div>
                <div class="card-body px-4 py-4">
                    <form method="POST" action="{{ route('users.change.password', $user->id) }}">
                        @csrf

                        <div class="mb-3">
                            <label for="password" class="form-label">Nouveau mot de passe</label>
                            <input type="password" name="password" id="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   autocomplete="new-password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">Confirmer le mot de passe</label>
                            <input type="password" name="password_confirmation" id="password-confirm"
                                   class="form-control" autocomplete="new-password">
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('user.index') }}" class="btn btn-secondary me-2">Annuler</a>
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
