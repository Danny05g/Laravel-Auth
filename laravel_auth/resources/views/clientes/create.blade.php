@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Registrar cliente</div>

        <div class="card-body">
            @if (session('ok'))
                <div class="alert alert-success">
                    {{ session('ok') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('clientes.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input
                        type="text"
                        id="nombre"
                        name="nombre"
                        class="form-control"
                        value="{{ old('nombre') }}"
                        maxlength="255"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input
                        type="email"
                        id="correo"
                        name="correo"
                        class="form-control"
                        value="{{ old('correo') }}"
                        maxlength="255"
                        required
                    >
                </div>

                <button type="submit" class="btn btn-primary">
                    Guardar cliente
                </button>
            </form>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">Clientes registrados</div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->id }}</td>
                                <td>{{ $cliente->nombre }}</td>
                                <td>{{ $cliente->correo }}</td>
                                <td>
                                    <a href="{{ route('clientes.edit', $cliente) }}"
                                    class="btn btn-warning btn-sm">
                                        Editar
                                    </a>

                                    <form
                                        action="{{ route('clientes.destroy', $cliente) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('¿Deseas eliminar este cliente?');"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">Aún no hay clientes registrados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection