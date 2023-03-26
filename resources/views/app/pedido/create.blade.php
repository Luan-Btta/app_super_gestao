@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>{{ $titulo }}</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
                <li><a href="{{ route('pedido.create') }}">Consulta</a></li>

            </ul>
        </div>
        <div class="informacao-pagina">
            @component('app.pedido._components.form_pedido', ['button' => $button, 'classe' => $classe, 'pedido' => isset($pedido) ? $pedido : '', 'acao' => $acao, 'clientes' => $clientes])
            @endcomponent
        </div>
    </div>
@endsection
