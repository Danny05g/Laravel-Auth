@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Editar cliente</div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST"
                  action="{{ route('clientes.update', $cliente) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input
                        type="text"
                        id="nombre"
                        name="nombre"
                        class="form-control"
                        value="{{ old('nombre', $cliente->nombre) }}"
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
                        value="{{ old('correo', $cliente->correo) }}"
                        maxlength="255"
                        required
                    >
                </div>

                <button type="submit" class="btn btn-primary">
                    Guardar cambios
                </button>

                <a href="{{ route('clientes.create') }}"
                   class="btn btn-secondary">
                    Cancelar
                </a>
            </form>
        </div>
    </div>
</div>
@endsection