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
                            <th>Peso</th>
                            <th>UN</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->descricao }}</td>
                                <td>{{ $produto->peso }}KG</td>
                                <td>
                                    @foreach ($unidades as $unidade)
                                        {{ $produto->unidade_id === $unidade->id ? $unidade->descricao : '' }}
                                    @endforeach
                                </td>
                                <td><a href="{{ route('produto.show', ['produto' => $produto->id]) }}">Visualizar</a></td>
                                <td><a href="">Excluir</a></td>
                                <td><a href="">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
