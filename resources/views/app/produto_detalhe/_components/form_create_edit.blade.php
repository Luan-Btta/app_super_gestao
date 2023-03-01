<div style="width: 30%; margin: 50px auto 0 auto">
    @if ($acao == 'produto-detalhe.update')
        <form action="{{ route($acao, $produto_detalhe->id) }}" method="POST">
        @method('PUT')
    @else
        <form action="{{ route($acao) }}" method="POST">
    @endif
        @csrf
        @if (isset($produto_detalhe->id) && $produto_detalhe->id != '')
            <input type="hidden" name="id" value="{{ $produto_detalhe->id }}">
        @endif
        <input type="text" name="nome" value="{{ $produto_detalhe->nome ?? old('nome') }}" placeholder="Nome" class="{{ $classe }}">
        {{$errors->has('nome') ? $errors->first('nome') : ''}}
        <input type="text" name="descricao" value="{{ $produto_detalhe->descricao ?? old('descricao') }}" placeholder="Descrição" class="{{ $classe }}">
        {{$errors->has('descricao') ? $errors->first('descricao') : ''}}
        <input type="number" name="peso" value="{{ $produto_detalhe->peso ?? old('peso') }}" min="1" max="999" placeholder="Peso em KG" class="{{ $classe }}">
        {{$errors->has('peso') ? $errors->first('peso') : ''}}
        <button type="submit">{{ $button }}</button>
    </form>
</div>