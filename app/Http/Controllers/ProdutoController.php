<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Ramsey\Collection\Collection;
use App\Models\Unidade;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $msg = '')
    {
        //
        $produtos = Produto::simplePaginate(10);

        //dd($produtos);

        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request, 'titulo' => 'Produtos - Listar']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        //dd($unidades);

        return view('app.produto.create', ['titulo' => 'Produtos - Adicionar', 'classe' => 'borda-preta', 'button' => 'Adicionar', 'unidades' => $unidades]);
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
            'nome' => 'required|',
            'descricao' => 'required',
            'peso' => 'required',
            'unidade_id' => 'required'
        ];
        $retornos = [
            'required' => 'O campo :attribute é obrigatório',
            'unidade_id.required' => 'O campo unidade é obrigatorio'
        ];
        
        $request->validate($regras, $retornos);

        Produto::create($request->all());

        redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        //
    }
}
