@extends('layouts.app')

@section('title', __('Dashboard'))

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-2">{{ __('Dashboard') }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">{{ __('Dashboard') }}</li>
    </ol>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col-xl-4 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <i class="fas fa-user-check me-2"></i>{{ __('You are logged in!') }}
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <span class="small text-white">{{ Auth::user()->email }}</span>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <i class="fas fa-users me-2"></i>Clientes
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="{{ route('clientes.create') }}">Gestionar clientes</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-info-circle me-1"></i>
            Bienvenido
        </div>
        <div class="card-body">
            Hola, <strong>{{ Auth::user()->name }}</strong>. Usa el menú lateral para navegar por la aplicación.
        </div>
    </div>
</div>
@endsection
