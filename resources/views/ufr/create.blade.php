@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mb-3">
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
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-header">Formulaire d'ajout des UFR de {{ $universite->nom }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('univ-ufr-store', [$universite->designation, $universite->id]) }}">
                        @csrf
                        <div class="mb-3">
                            <label for="nom">Nom de l'UFR</label>
                            <input id="nom" type="text" class="form-control" name="nom">
                        </div>

                        <div class="mb-3">
                            <label for="designation">Designation de l'UFR</label>
                            <input id="designation" type="text" class="form-control" name="designation" required>
                        </div>

                        <div class="mb-3 text-end">
                            <button type="submit" class="btn btn-success">AJOUTER</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
