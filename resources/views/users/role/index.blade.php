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
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>Liste des roles des utilisateurs</div>
                    <a href="{{ route('form-create-role') }}" class="btn btn-sm btn-primary">Ajouter</a>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('#') }}</th>
                                <th scope="col">{{ __('Designation') }}</th>
                                <th scope="col">{{ __('Description') }}</th>
                                <th scope="col">{{ __('Created_at') }}</th>
                                <th scope="col">{{ __('Updated_at') }}</th>
                                <th scope="col">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $role->designation }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td>{{ $role->created_at }}</td>
                                    <td>{{ $role->updated_at }}</td>
                                    <td class="btn-group">
                                        <a href="{{ route('form-edit-role-data', $role->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                        <a href="{{ route('destroy-role-data', $role->id) }}" class="btn btn-sm btn-outline-danger">Del</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mb-3">{{ $roles->links() }}</div>


                </div>
            </div>
        </div>
    </div>

</div>
@endsection
