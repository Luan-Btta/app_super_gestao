@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>{{ $titulo }}</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Adicionar</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consultar</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 90%; margin: 50px auto 0 auto">
                {{ isset($msg) && $msg != '' ? $msg : '' }}
                <table>
                    <thead>
                        <tr>
                            <th>Nome / Razão Social</th>
                            <th>Site</th>
                            <th>UF</th>
                            <th>E-mail</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fornecedores as $fornecedor)
                            <tr>
                                <td>{{ $fornecedor->nome }}</td>
                                <td>{{ $fornecedor->site }}</td>
                                <td>{{ $fornecedor->uf }}</td>
                                <td>{{ $fornecedor->email }}</td>
                                <td><a href="{{ route('app.fornecedor.excluir', $fornecedor->id) }}">Excluir</a></td>
                                <td><a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}">Editar</a></td>
                            </tr>
                            <tr>
                                <td colspan=6>
                                    <p>Lista de Produtos: </p>
                                    <table border="1" style="margin: 20px">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Nome</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($fornecedor->produtos as $produto)
                                                <tr>
                                                    <td>
                                                        {{ $produto->id }}
                                                    </td>
                                                    <td>
                                                        {{ $produto->nome }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination">
                    {{ $fornecedores->appends($request)->links() }}
                    <br>
                    {{ $fornecedores->count() }} - Total de registros por página
                    <br>
                    {{ $fornecedores->total() }} - Total de registros da consulta
                    <br>
                    {{ $fornecedores->firstItem() }} - Nímero do primeiro registro da página
                    <br>
                    {{ $fornecedores->lastItem() }} - Nímero do ultimo registro da página
                </div>
            </div>
        </div>
    </div>
@endsection
