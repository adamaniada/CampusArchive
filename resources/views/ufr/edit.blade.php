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
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-header">Edition des ufr</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('univ-ufr-update', [$univ_designation, $ufr->designation]) }}">
                        @csrf
                        <div class="mb-3">
                            <label for="nom">Nom de la filiere</label>
                            <input id="nom" type="text" class="form-control" name="nom" value="{{ $ufr->nom }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="designation">Designation de la filiere</label>
                            <input id="designation" type="text" class="form-control" name="designation" value="{{ $ufr->designation }}" required>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">CREER</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
