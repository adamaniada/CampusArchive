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
                <div class="card-header">Formulaire de creation des utilisateurs</div>
                <div class="card-body">
                    <form action="{{ route('store-user-data') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control" name="nom" placeholder="nom" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="prenom">Prenom</label>
                                <input type="text" class="form-control" name="prenom" placeholder="prenom" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="email">Address Mail</label>
                                <input type="email" class="form-control" name="email" placeholder="email" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="role">Role</label>
                                <select name="role" id="role" class="form-select">
                                    <option selected>Open select this menu</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->designation }}">{{ $role->designation }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="avatar">Photo de profil(optionel)</label>
                                <input type="file" class="form-control" name="avatar" placeholder="avatar">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="password">Mot de pass</label>
                                <input type="password" class="form-control" name="password" placeholder="Mot de pass" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="confirm-password">Confirmer le mot de pass</label>
                                <input type="password" class="form-control" name="confirm-password" placeholder="Confirmer le mot de pass">
                            </div>

                            <div class="col-md-12 text-end"><button type="submit" class="btn btn-primary">Ajouter</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
