<div style="width: 30%; margin: 50px auto 0 auto">
    @if ($acao == 'produto-detalhe.update')
        <form action="{{ route($acao, $produtoDetalhe->id) }}" method="POST">
            @method('PUT')
        @else
            <form action="{{ route($acao) }}" method="POST">
    @endif
    @csrf
    @if (isset($produtoDetalhe->id) && $produtoDetalhe->id != '')
        <input type="hidden" name="id" value="{{ $produtoDetalhe->id }}">
    @endif
    <select name="produto_id">
        <option value="">Selecione o produto referenciado</option>
        @foreach ($produtos as $produto)
            <option value="{{ $produto->id }}"
                {{ (isset($produtoDetalhe->id) && $produtoDetalhe->produto_id == $produto->id) || $produto->id == old('produto_id') ? 'Selected' : '' }}>
                {{ $produto->nome }}</option>
        @endforeach
    </select>
    {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

    <input type="text" name="comprimento" value="{{ $produtoDetalhe->comprimento ?? old('comprimento') }}"
        placeholder="Insira o comprimento do item">
    {{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}

    <input type="text" name="largura" value="{{ $produtoDetalhe->largura ?? old('largura') }}"
        placeholder="Insira o largura do item">
    {{ $errors->has('largura') ? $errors->first('largura') : '' }}

    <input type="text" name="altura" value="{{ $produtoDetalhe->altura ?? old('altura') }}"
        placeholder="Insira o altura do item">
    {{ $errors->has('altura') ? $errors->first('altura') : '' }}

    <select name="unidade_id">
        <option value="">Selecione a Unidade de Medida</option>
        @foreach ($unidades as $unidade)
            <option value="{{ $unidade->id }}"
                {{ (isset($produtoDetalhe->unidade_id) && $produtoDetalhe->unidade_id === $unidade->id) || old('unidade_id') == $unidade->id ? 'Selected' : '' }}>
                {{ $unidade->descricao }}</option>
        @endforeach
    </select>

    <button type="submit">{{ $button }}</button>
    </form>
</div>
