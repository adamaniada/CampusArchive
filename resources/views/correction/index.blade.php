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
        <div class="col-md-8 mb-3">
            <div class="card shadow-sm">
                <div class="nav-scroller bg-body">
                    <nav class="nav" aria-label="Secondary navigation">
                        @foreach (json_decode($examen->path) as $path)
                            @for ($i=0; $i<count($path); $i++)
                                @if ($path[$i] == 'photos')
                                    <img class="card-img-top img-fluid img-thumbnail" src="{{ asset($path[$i+1]) }}" alt="photos">
                                @endif
                            @endfor
                        @endforeach
                    </nav>
                </div>
                <div class="card-body">
                    {{-- <div>ID : {{ $examen->id }}</div>
                    <div>ID_UNVIVERS : {{ $examen->id_univ }}</div>
                    <div>ID_FILIERE : {{ $examen->id_filiere }}</div> --}}
                    <div>NOM_EXAMEN : {{ $examen->nom }}</div>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <div>@include('include.examen_published_at')</div>
                    <div class="btn-group">
                        <a href="{{ route('form-edit-examen', [$designation_univ, $designation_ufr, $designation_filiere, $examen->id]) }}" class="btn btn-sm btn-outline-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                            </svg>
                        </a>
                        <a href="{{ route('destroy-examen-data', [$designation_univ, $designation_ufr, $designation_filiere, $examen->id]) }}" class="btn btn-sm btn-outline-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8 mb-3">
            <div class="card shadow-sm">
                <div class="card-header">Correction</div>
                <div class="card-body">
                    mlkjhgfd
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <div>Correction</div>
                    <div>Correction</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
