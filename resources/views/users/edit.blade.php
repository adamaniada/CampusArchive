@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-4 mb-3">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-header">Formulaire d'edition des utilisateurs</div>
                <div class="card-body">
                    <form action="{{ route('update-user-data', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control" name="nom" value="{{ $user->nom }}" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="prenom">Prenom</label>
                                <input type="text" class="form-control" name="prenom" value="{{ $user->prenom }}" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="email">Address Mail</label>
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="role">Role</label>
                                <select name="role" id="role" class="form-select">
                                    <option value="invite" selected>Open select this menu</option>
                                    <option value="invite">Invite</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="avatar">Photo de profil(optionel)</label>
                                <input type="file" class="form-control" name="avatar">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="password">Nouveau Mot de pass</label>
                                <input type="password" class="form-control" name="new-password" placeholder="Optionnel">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="confirm-password">Confirmer le nouveau mot de pass</label>
                                <input type="password" class="form-control" name="confirm-new-password" placeholder="Optionnel">
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="w-100 btn btn-primary">EDITER</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
