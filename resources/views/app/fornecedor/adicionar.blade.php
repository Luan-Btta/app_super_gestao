@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>{{ $titulo }}</p>
        </div>
        @component('app.layouts._components.menu')
        @endcomponent
        <div class="informacao-pagina">
            {{ isset($msg) && $msg != '' ? $msg : '' }}
            @component('app.layouts._components.form_fornecedor', ['button' => 'Cadastrar', 'classe' => 'borda-preta', 'metodo' => 'app.fornecedor.adicionar', 'tipo' => 'email'])
            @endcomponent
        </div>
    </div>
@endsection
