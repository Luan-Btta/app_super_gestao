@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>{{ $titulo }}</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Adicionar</a></li>
                <li><a href="{{ route('produto.create') }}">Consulta</a></li>

            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 90%; margin: 50px auto 0 auto">
                {{ isset($msg) && $msg != '' ? $msg : '' }}
                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Fornecedor</th>
                            <th>Peso</th>
                            <th>UN</th>
                            <th>Comprimento</th>
                            <th>Altura</th>
                            <th>Largura</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @dd($produtos) --}}
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->descricao }}</td>
                                <td>{{ $produto->fornecedor->nome }}</td>
                                <td>{{ $produto->peso }}KG</td>
                                <td>
                                    @foreach ($unidades as $unidade)
                                        {{ $produto->unidade_id === $unidade->id ? $unidade->descricao : '' }}
                                    @endforeach
                                </td>
                                <td>{{ $produto->produtoDetalhe->comprimento ?? '0' }} cm</td>
                                <td>{{ $produto->produtoDetalhe->largura ?? '0' }} cm</td>
                                <td>{{ $produto->produtoDetalhe->altura ?? '0' }} cm</td>
                                <td><a href="{{ route('produto.show', ['produto' => $produto->id]) }}">Visualizar</a></td>
                                <td>
                                    <form id="form_{{ $produto->id }}" action="{{ route('produto.destroy', ['produto' => $produto->id]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{ $produto->id }}').submit()">Excluir</a>
                                    </form>
                                </td>
                                <td><a href="{{ route('produto.edit', ['produto' => $produto->id]) }}">Editar</a></td>
                            </tr>
                            <tr>
                                <td colspan='11'>
                                    <p>Pedidos</p>
                                    @php $contador = [] @endphp
                                    @foreach ($produto->pedidos as $pedido)
                                        @if(in_array($pedido->id, $contador))
                                            @continue;
                                        @endif
                                        Pedido: <a href="{{route('pedido-produto.create', ['pedido' => $pedido->id]) }}">{{ $pedido->id }}</a>
                                        @php $contador[] = $pedido->id @endphp
                                    @endforeach
                                    @if ($contador === [])
                                        <p>Não há pedidos desse item</p>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $produtos->appends($request)->links() }}
            </div>
        </div>
    </div>
@endsection
