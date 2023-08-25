@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
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
         
    <div class="row g-5">
        @foreach ($universites as $universite)
            <div class="col-md-12 mb-3">
                <h2 class="fw-bolder">{{ $universite->nom }}</h2>
                @php
                    $ufrs = App\Models\UFR::where('id_univ', '=', $universite->id)->get();
                @endphp
                @if (count($ufrs) == 0)
                    <h5 class="text-muted">Pas de données sur les ufrs</h5>
                @else
                    @foreach ($ufrs as $ufr)
                        <h5>{{ $ufr->nom }}</h5>
                        @php
                            $filieres = App\Models\Filiere::where('id_univ', '=', $ufr->id_univ)->where('id_ufr', '=', $ufr->id)->get();
                        @endphp
                        @if (count($filieres) == 0)
                            {{-- <ul class="icon-list ps-0">
                                <li class="text-muted d-flex align-items-start mb-1">Pas de données sur les filieres</li>
                            </ul> --}}
                        @else
                            <ul class="icon-list ps-0">
                                @foreach ($filieres as $filiere)
                                    <li class="d-flex align-items-start mb-1"><a href="{{ route('show-examen', [$universite->designation, $ufr->designation, $filiere->designation]) }}">{{ $filiere->nom }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    @endforeach
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection
