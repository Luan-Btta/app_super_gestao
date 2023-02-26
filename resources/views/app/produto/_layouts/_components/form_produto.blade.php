<div style="width: 30%; margin: 50px auto 0 auto">
    <form action="{{ route('produto.store') }}" method="POST">
        @csrf
        @if (isset($produto->id) && $produto->id != '')
            <input type="hidden" name="id" value="{{ $produto->id }}">
        @endif
        <input type="text" name="nome" value="{{ $produto->nome ?? old('nome') }}" placeholder="Nome" class="{{ $classe }}">
        {{$errors->has('nome') ? $errors->first('nome') : ''}}
        <input type="text" name="descricao" value="{{ $produto->descricao ?? old('descricao') }}" placeholder="Descrição" class="{{ $classe }}">
        {{$errors->has('descricao') ? $errors->first('descricao') : ''}}
        <input type="number" name="peso" value="{{ $produto->peso ?? old('peso') }}" min="1" max="999" placeholder="Peso em KG" class="{{ $classe }}">
        {{$errors->has('peso') ? $errors->first('peso') : ''}}
        <select name="unidade_id">
            <option value="">Selecione a Unidade de Medida</option>
            @foreach ($unidades as $unidade)
                <option value="{{ $unidade->id }}" {{ (isset($produto->unidade_id) && $produto->unidade_id === $unidade_id) || (old('unidade_id') == $unidade->id) ? 'Selected' : '' }}>{{ $unidade->descricao }}</option>
            @endforeach
        </select>
        {{$errors->has('unidade_id') ? $errors->first('unidade_id') : ''}}
        <button type="submit">{{ $button }}</button>
    </form>
</div>