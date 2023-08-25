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
                <div class="card-header d-flex justify-content-between align-items-center">{{ __('Formulaire de publications des examens') }}</div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('store-examen-data', [$designation_univ, $designation_ufr, $designation_filiere]) }}">
                        @csrf
                            <div class="mb-3">
                                <label for="module">Module</label>
                                <input id="module" type="text" class="form-control" name="module" required>
                            </div>

                            <div class="mb-3">
                                <label for="path">Selectionner des fichiers</label>
                                <input id="path" type="file" class="form-control" multiple name="path[]" required>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">PUBLIER</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
