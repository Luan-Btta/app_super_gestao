@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>{{ $titulo }}</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                <li><a href="{{ route('produto.create') }}">Consulta</a></li>

            </ul>
        </div>
        <div class="informacao-pagina">
            @component('app.cliente._components.form_cliente', ['button' => $button, 'classe' => $classe, 'cliente' => isset($cliente) ? $cliente : '', 'acao' => $acao])
            @endcomponent
        </div>
    </div>
@endsection
