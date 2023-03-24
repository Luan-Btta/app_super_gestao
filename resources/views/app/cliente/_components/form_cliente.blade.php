<div style="width: 30%; margin: 50px auto 0 auto">
    @if ($acao == 'cliente.update')
        <form action="{{ route($acao, $cliente->id) }}" method="POST">
        @method('PUT')
    @else
        <form action="{{ route($acao) }}" method="POST">
    @endif
        @csrf
        @if (isset($cliente->id) && $cliente->id != '')
            <input type="hidden" name="id" value="{{ $cliente->id }}">
        @endif
        <input type="text" name="nome" value="{{ $cliente->nome ?? old('nome') }}" placeholder="Nome" minlength="3" maxlength="40" required class="{{ $classe }}">
        {{$errors->has('nome') ? $errors->first('nome') : ''}}
        <button type="submit">{{ $button }}</button>
    </form>
</div>