<div style="width: 30%; margin: 50px auto 0 auto">
    @if ($acao == 'pedido.update')
        <form action="{{ route($acao, $pedido->id) }}" method="POST">
        @method('PUT')
    @else
        <form action="{{ route($acao) }}" method="POST">
    @endif
        @csrf
        @if (isset($pedido->id) && $pedido->id != '')
            <input type="hidden" name="id" value="{{ $pedido->id }}">
        @endif
        <select name="cliente_id">
            <option value="">Selecione o Cliente deste Pedido</option>
            @foreach ($clientes as $cliente)
                <option value="{{ $cliente->id }}" {{ (isset($pedido->cliente_id) && $pedido->cliente_id === $cliente->id) || (old('cliente_id') == $cliente->id) ? 'Selected' : '' }}>{{ $cliente->nome }}</option>
            @endforeach
        </select>
        {{$errors->has('cliente_id') ? $errors->first('cliente_id') : ''}}
        <button type="submit">{{ $button }}</button>
    </form>
</div>