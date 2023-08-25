@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-3">
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
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>Liste des utilisateurs</div>
                    <a href="{{ route('form-create-user') }}" class="btn btn-sm btn-primary">Ajouter</a>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('#') }}</th>
                                <th scope="col">{{ __('Nom') }}</th>
                                <th scope="col">{{ __('Prenom') }}</th>
                                <th scope="col">{{ __('Role') }}</th>
                                <th scope="col">{{ __('Created_at') }}</th>
                                <th scope="col">{{ __('Updated_at') }}</th>
                                <th scope="col">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $user->nom }}</td>
                                    <td>{{ $user->prenom }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $user->updated_at }}</td>
                                    <td class="btn-group">
                                        <a href="{{ route('show-user', $user->id) }}" class="btn btn-sm btn-outline-info">View</a>
                                        <a href="{{ route('form-edit-user-data', $user->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                        <a href="{{ route('destroy-user-data', $user->id) }}" class="btn btn-sm btn-outline-danger">Del</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mb-3">{{ $users->links() }}</div>


                </div>
            </div>
        </div>
    </div>

</div>
@endsection
