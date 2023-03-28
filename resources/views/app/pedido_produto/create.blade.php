@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>{{ $titulo }}</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.index') }}">Voltar</a></li>
                <li><a href="{{ route('cliente.create') }}">Consulta</a></li>

            </ul>
        </div>
        <div class="informacao-pagina">
            <h4>Detalhes do Pedido</h4>
            <p>ID do pedido: {{ $pedido->id }}</p>
            <p>ID do Cliente: {{ $pedido->cliente_id }}</p>
            <h3>Itens do pedido</h3>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>QTD</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php $produto_quantidade = []; @endphp
                    @foreach($pedido->produtos as $produto)
                    @php
                        if(in_array($produto->id, $produto_quantidade)){
                            continue;
                        }
                        $quantidade=0;
                        $quantidade = DB::table('pedidos_produtos')->where('produto_id', $produto->id)->where('pedido_id', $pedido->id)->count();
                    @endphp
                    <tr>
                        <td>{{ $produto->id }}</td>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $quantidade }}</td>
                        <td>
                            <form id="form_{{$produto->pivot->id}}" method="POST" action="{{ route('pedido-produto.destroy', ['pedidoProduto' => $produto->pivot->id, 'pedido' => $pedido->id])}}">
                                @method('DELETE')
                                @csrf
                            </form>  
                            <a href="#" onclick="document.getElementById('form_{{$produto->pivot->id}}').submit()">Excluir</a>                          
                        </td>
                    </tr>
                    @php
                        $quantidade > 1 ? $produto_quantidade[] = $produto->id : '';                    
                    @endphp
                    @endforeach
                </tbody>
            </table>
            @component('app.pedido_produto._components.form_pedido_produto', [
                'titulo' => $titulo,
                'button' => $button,
                'classe' => $classe,
                'cliente' => isset($cliente) ? $cliente : '',
                'acao' => $acao,
                'pedido' => $pedido,
                'produtos' => $produtos,
            ])
            @endcomponent
        </div>
    </div>
@endsection
