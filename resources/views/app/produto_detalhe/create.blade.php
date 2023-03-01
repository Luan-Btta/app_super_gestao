@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>{{ $titulo }}</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto-detalhe.index') }}">Voltar</a></li>
                <li><a href="{{ route('produto-detalhe.create') }}">Consulta</a></li>

            </ul>
        </div>
        <div class="informacao-pagina">
            @component('app.produto_detalhe._components.form_create_edit', ['button' => $button, 'classe' => $classe, 'acao' => $acao])
            @endcomponent
        </div>
    </div>
@endsection
