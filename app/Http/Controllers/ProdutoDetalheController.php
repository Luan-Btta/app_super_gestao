<?php

namespace App\Http\Controllers;

use App\Models\ProdutoDetalhe;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Unidade;

class ProdutoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produtos = Produto::orderBy('nome')->get();
        $unidades = Unidade::all();


        return view('app.produto_detalhe.create', ['titulo' => 'Adicionar Detalhes ao Produto','button' => 'Adicionar', 'classe' => 'borda-preta', 'acao' => 'produto-detalhe.store', 'produtos' => $produtos, 'unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProdutoDetalhe::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProdutoDetalhe  $produtoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function show(ProdutoDetalhe $produtoDetalhe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProdutoDetalhe  $produtoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdutoDetalhe $produtoDetalhe)
    {
        $produtos = Produto::orderBy('nome')->get();
        $unidades = Unidade::all();

        return view('app.produto_detalhe.create', ['titulo' => 'Atualizar Detalhes do Produto','button' => 'Atualizar', 'classe' => 'borda-preta', 'acao' => 'produto-detalhe.update', 'produtos' => $produtos, 'unidades' => $unidades, 'produtoDetalhe' => $produtoDetalhe]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProdutoDetalhe  $produtoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdutoDetalhe $produtoDetalhe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProdutoDetalhe  $produtoDetalhe
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdutoDetalhe $produtoDetalhe)
    {
        //
    }
}
