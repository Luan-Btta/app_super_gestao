<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\PedidoProduto;
use App\Models\Produto;


class PedidoProdutoController extends Controller
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function create(Pedido $pedido)
    {
        $produtos = Produto::all();
        //$pedido->produtos;

        return view('app.pedido_produto.create', ['titulo' => 'Adicionar Produtos ao Pedido', 'acao' => 'pedido-produto.store', 'button' => 'Adicionar', 'classe' => 'borda-preta', 'pedido' => $pedido, 'produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {  
        $produtos = Produto::all();

        $regras = [
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required'
        ];

        $feedback = [
            'required' => 'Este campo é obrigatório',
            'exists' => 'Campo inválido, tente novamente'
        ];

        $request->validate($regras, $feedback);

        //PedidoProduto::create(['pedido_id' => $pedido->id, 'produto_id' => $request->get('produto_id')]);

        //$pedido->produtos()->attach($request->get('produto_id'), ['quantidade' => $request->get('quantidade')]);

        $pedido->produtos()->attach([
            $request->get('produto_id') => ['quantidade' => $request->get('quantidade')]
        ]);

        return redirect()->route('pedido-produto.create', ['titulo' => 'Adicionar Produtos ao Pedido', 'acao' => 'pedido-produto.store', 'button' => 'Adicionar', 'classe' => 'borda-preta', 'pedido' => $pedido, 'produtos' => $produtos]);

        /*
        echo '<pre>';
        print_r($pedido->id);
        echo '</pre>';
        echo '<hr>';
        echo '<pre>';
        print_r($request->get('produto_id'));
        echo '</pre>';*/
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
    public function destroy(PedidoProduto $pedidoProduto, Pedido $pedido)
    {
        $produtos = Produto::all();
        //CONVENCIONAL
        // PedidoProduto::where(['pedido_id' => $pedido->id, 'produto_id' => $produto->id])->delete();

        //DETACH
        $pedidoProduto->delete();
        //PRODUTO_ID JÁ ESTÁ DISPONÍVEL NO OBJETO INSTANCIADO

        return view('app.pedido_produto.create', ['titulo' => 'Adicionar Produtos ao Pedido', 'acao' => 'pedido-produto.store', 'button' => 'Adicionar', 'classe' => 'borda-preta', 'pedido' => $pedido, 'produtos' => $produtos]);
    }
}
