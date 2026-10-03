<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function create()
    {
        $clientes = Cliente::latest()->get();

        return view('clientes.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'correo' => ['required', 'email', 'max:255', 'unique:clientes,correo'],
        ]);

        Cliente::create($datos);

        return redirect()
            ->route('clientes.create')
            ->with('ok', 'Cliente guardado correctamente.');
    }

    public function edit(Cliente $cliente)
{
    return view('clientes.edit', compact('cliente'));
}

    public function update(Request $request, Cliente $cliente)
    {
        $datos = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'correo' => [
                'required',
                'email',
                'max:255',
                \Illuminate\Validation\Rule::unique('clientes', 'correo')
                    ->ignore($cliente->id),
            ],
        ]);

        $cliente->update($datos);

        return redirect()
            ->route('clientes.create')
            ->with('ok', 'Cliente actualizado correctamente.');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()
            ->route('clientes.create')
            ->with('ok', 'Cliente eliminado correctamente.');
    }
}