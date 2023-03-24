<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clientes = Cliente::simplePaginate(5);

        return view('app.cliente.index', ['clientes' => $clientes, 'request' => $request->all(), 'titulo' => 'Clientes - Listar']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.cliente.create', ['titulo' => 'Clientes - Adicionar', 'acao' => 'cliente.store', 'button' => 'Cadastrar', 'classe' => 'borda-preta']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:40|unique:clientes'
        ];

        $feedback = [
            'required' => 'O camnpo :attribute deve ser preenchido',
            'nome.min' => 'O camnpo :attribute deve ter no mínimo 3 caracteres',
            'nome.max' => 'O camnpo :attribute deve ter no máximo 40 caracteres',
            'nome.unique' => 'Cliente já cadastrado'
        ];

        $request->validate($regras, $feedback);

        $cliente = new Cliente();
        $cliente->nome = $request->get('nome');

        $cliente->save();

        return view('app.cliente.create', ['titulo' => 'Clientes - Atualizar', 'acao' => 'cliente.update', 'button' => 'Atualizar', 'classe' => 'borda-preta', 'cliente' => $cliente]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
