@extends("layouts.master")

@section('content')

<section class="content">
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-10">

                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-header bg-secondary text-white">
                        <h4 class="mb-0">Mon Profil</h4>
                    </div>
                    <div class="card-body px-4 py-4">
                        <form class="form" method="POST" action="{{ route('adminUpdateInfo') }}" id="AdminInfoForm">
                            @csrf

                            <!-- Informations personnelles -->
                            <div class="mb-3 row">
                                <label for="inputName" class="col-sm-3 col-form-label fw-bold">Nom</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" id="inputName" class="form-control"
                                        value="{{ Auth::user()->name }}" placeholder="Nom complet">
                                    <span class="text-danger small name_error"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="inputEmail" class="col-sm-3 col-form-label fw-bold">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" id="inputEmail" class="form-control"
                                        value="{{ Auth::user()->email }}" placeholder="Adresse email">
                                    <span class="text-danger small email_error"></span>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <div class="offset-sm-3 col-sm-9 text-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-1"></i> Enregistrer les modifications
                                    </button>
                                </div>
                            </div>

                            <hr class="my-4">

                            <!-- Changement de mot de passe -->
                            <h5 class="text-secondary">Changer le mot de passe</h5>

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label fw-bold">Ancien mot de passe</label>
                                <div class="col-sm-9">
                                    <input type="password" name="oldpassword" class="form-control"
                                        placeholder="Mot de passe actuel">
                                    <span class="text-danger small oldpassword_error"></span>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label fw-bold">Nouveau mot de passe</label>
                                <div class="col-sm-9">
                                    <input type="password" name="newpassword" id="newpassword" class="form-control"
                                        placeholder="Nouveau mot de passe">
                                    <span class="text-danger small newpassword_error"></span>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label class="col-sm-3 col-form-label fw-bold">Confirmer nouveau mot de passe</label>
                                <div class="col-sm-9">
                                    <input type="password" name="cnewpassword" id="cnewpassword" class="form-control"
                                        placeholder="Confirmer le mot de passe">
                                    <span class="text-danger small cnewpassword_error"></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="offset-sm-3 col-sm-9 text-end">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-key me-1"></i> Mettre à jour le mot de passe
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div> <!-- /.card-body -->
                </div> <!-- /.card -->

            </div>
        </div>
    </div>
</section>

@endsection
