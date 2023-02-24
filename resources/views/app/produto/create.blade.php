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
            @component('app.produto._layouts._components.form_produto', ['button' => $button, 'classe' => 'borda-preta', 'metodo' => 'produto.create', 'unidades' => $unidades])
            @endcomponent
        </div>
    </div>
@endsection
