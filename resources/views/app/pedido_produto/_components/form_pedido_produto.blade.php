<div style="width: 30%; margin: 50px auto 0 auto">
    @if ($acao == 'pedido-produto.update')
        <form action="{{ route($acao, $pedido->id) }}" method="POST">
        @method('PUT')
    @else
        <form action="{{ route($acao,  $pedido->id) }}" method="POST">
    @endif
        @csrf
        <select name="produto_id">
            <option value="">Selecione um produto</option>
            @foreach ($produtos as $produto)
                <option value="{{ $produto->id }}" {{ old('produto_id') == $produto->id ? 'Selected' : '' }}>{{ $produto->nome }}</option>
            @endforeach
        </select>
        {{$errors->has('produto_id') ? $errors->first('produto_id') : ''}}
        <button type="submit">{{ $button }}</button>
    </form>
</div>