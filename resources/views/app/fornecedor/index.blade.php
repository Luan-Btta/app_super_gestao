@extends('app.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>{{ $titulo }}</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="">Adicionar</a></li>
                <li><a href="">Consultar</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 30%; margin: 50px auto 0 auto">
                <form action="" method="POST">
                    @csrf
                    <input type="text" name="nome" placeholder="Nome" class="{{ $classe }}">
                    <input type="text" name="site" placeholder="Site" class="{{ $classe }}">
                    <input type="text" name="uf" placeholder="UF" class="{{ $classe }}">
                    <input type="text" name="email" placeholder="Email" class="{{ $classe }}">
                    <button type="submit">Pesquisar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
