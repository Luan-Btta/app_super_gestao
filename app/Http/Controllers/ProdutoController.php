<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Ramsey\Collection\Collection;
use App\Models\Unidade;
use App\Models\ProdutoDetalhe;
use App\Models\Fornecedor;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $msg = '')
    {
        //$produtos = Produto::simplePaginate(10); LAZY LOADING
        $produtos = Produto::with('produtoDetalhe', 'fornecedor')->simplePaginate(10); //EAGER LOADING WITH('MÉTODOS DO MODEL')
        $unidades = Unidade::all();

        /*
        foreach($produtos as $chave => $produto){
            $produtoDetalhe = ProdutoDetalhe::where('produto_id', $produto->id)->first();

            if(isset($produtoDetalhe)){
                //print_r($produtoDetalhe->getAttributes());

                $produtos[$chave]['comprimento'] = $produtoDetalhe->comprimento;
                $produtos[$chave]['largura'] = $produtoDetalhe->largura;
                $produtos[$chave]['altura'] = $produtoDetalhe->altura;
            }
        }
        */
        //dd($produtos);

        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all(), 'titulo' => 'Produtos - Listar', 'unidades' => $unidades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();

        return view('app.produto.create', ['titulo' => 'Produtos - Adicionar', 'acao' => 'produto.store', 'button' => 'Cadastrar', 'classe' => 'borda-preta', 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
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
            'peso' => 'required|integer',
            'unidade_id' => 'required|exists:unidades,id'
        ];
        $retornos = [
            'required' => 'O campo :attribute é obrigatório',
            'unidade_id.required' => 'O campo unidade é obrigatorio',
            'integer' => 'O campo :attribute deve conter somente números',
            'unidade_id.exists' => 'Unidade inválida'
        ];
        
        $request->validate($regras, $retornos);

        Produto::create($request->all());

        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        $unidades = Unidade::all();

        return view('app.produto.show', ['titulo' => 'Produtos - Visualizar', 'produto' => $produto, 'unidades' => $unidades]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        //dd($unidades);

        return view('app.produto.create', ['titulo' => 'Produtos - Adicionar', 'acao' => "produto.update", 'button' => 'Atualizar', 'classe' => 'borda-preta', 'unidades' => $unidades, 'produto' => $produto, 'metodo' => 'PUT', 'fornecedores' => $fornecedores]);
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
        $regras = [
            'nome' => 'required|',
            'descricao' => 'required',
            'peso' => 'required|integer',
            'unidade_id' => 'required|exists:unidades,id'
        ];
        $retornos = [
            'required' => 'O campo :attribute é obrigatório',
            'unidade_id.required' => 'O campo unidade é obrigatorio',
            'integer' => 'O campo :attribute deve conter somente números',
            'unidade_id.exists' => 'Unidade inválida'
        ];
        
        $request->validate($regras, $retornos);

        $produto->update($request->all());

        return redirect()->route('produto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        $msg = 'Registro removido com sucesso';
        return redirect()->route('produto.index', ['msg' => $msg]);
        //dd($produto);
    }
}
