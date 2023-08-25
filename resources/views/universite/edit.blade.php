@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-3">
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
            <div class="card">
                <div class="card-header">Edition des universites</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('update-univ-data', $universite->id) }}">
                        @csrf
                        <div class="mb-3">
                            <label for="nom">Nom universite</label>
                            <input id="nom" type="text" class="form-control" name="nom" value="{{ $universite->nom }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="designation">Designation universite</label>
                            <input id="designation" type="text" class="form-control" name="designation" value="{{ $universite->designation }}" required>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">EDITER</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
