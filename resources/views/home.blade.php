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
        <div class="col-md-12 mb-3">

            <div class="row">
                <div class="col-md-2 mb-3">
                    <div class="card shadow-sm bg-danger text-white">
                        <div class="card-body text-center">
                            <h5>Total users</h5>
                            <div class="card-text">{{ App\Models\User::count() }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-3">
                    <div class="card shadow-sm bg-secondary text-white">
                        <div class="card-body text-center">
                            <h5>Total University</h5>
                            <div class="card-text">{{ App\Models\Universite::count() }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-3">
                    <div class="card shadow-sm">
                        <div class="card-body text-center bg-light">
                            <h5>Total UFR</h5>
                            <div class="card-text">{{ App\Models\UFR::count() }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-3">
                    <div class="card shadow-sm bg-info text-white">
                        <div class="card-body text-center">
                            <h5>Total Filiere</h5>
                            <div class="card-text">{{ App\Models\Filiere::count() }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-3">
                    <div class="card shadow-sm bg-success text-white">
                        <div class="card-body text-center">
                            <h5>Total Examen</h5>
                            <div class="card-text">{{ App\Models\Examen::count() }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 mb-3">
                    <div class="card shadow-sm bg-primary text-white">
                        <div class="card-body text-center">
                            <h5>Total Correction</h5>
                            <div class="card-text">{{ App\Models\Correction::count() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
