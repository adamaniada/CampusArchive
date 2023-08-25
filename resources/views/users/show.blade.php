@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{ __("Informations utilisateurs") }}</h1>
        </div>

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
        
        <div class="table-responsive">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    @if ($user->avatar == NULL)
                        <img class="img-thumbnail rounded bd-placeholder-img rounded-circle" width="140" height="140" src="{{ asset('fichiers/avatar.jpg') }}" alt="Photo de profil" srcset="">
                    @else
                        <img class="img-thumbnail rounded bd-placeholder-img rounded-circle" width="140" height="140" src="{{ $user->avatar }}" alt="Photo de profil" srcset="">
                    @endif
                </div>
                <div class="text-end">
                    <div>{{ ('Nom : ') }}</div>
                    <div>{{ ('Prenom : ') }}</div>
                    <div>{{ ('Address Mail : ') }}</div>
                    <div>{{ ('Type : ') }}</div>
                    <div>{{ ('Created_at : ') }}</div>
                    <div>{{ ('Updated_at : ') }}</div>
                </div>
                <div>
                    <div>{{ $user->nom }}</div>
                    <div>{{ $user->prenom }}</div>
                    <div>{{ $user->email }}</div>
                    <div>{{ $user->role }}</div>
                    <div>{{ $user->created_at }}</div>
                    <div>{{ $user->updated_at }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
