{{ $slot }}
<form action="{{ route('site.contato') }}" method="POST">
    @csrf
    <input type="text" name="nome" placeholder="Nome" value="{{ old('nome') }}" class="{{ $classe }}">
    {{ $errors->has('nome') ? $errors->first('nome') : ''}}
    <br>
    <input type="text" name="telefone" placeholder="Telefone" value="{{ old('telefone') }}" class="{{ $classe }}">
    {{ $errors->has('telefone') ? $errors->first('telefone') : ''}}
    <br>
    <input type="email" name="email" placeholder="E-mail" value="{{ old('email') }}" class="{{ $classe }}">
    {{ $errors->has('email') ? $errors->first('email') : ''}}
    <br>
    <select name="motivo_contatos_id" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $motivo_contato)
            <option value="{{ $motivo_contato->id }}"
                {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : '' }}>
                {{ $motivo_contato->motivo_contato }}</option>
        @endforeach
    </select>
    {{ $errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : ''}}
    <br>
    <textarea name="mensagem" class="{{ $classe }}" placeholder="Preencha aqui sua mensagem">{{ old('mensagem') }}</textarea>
    {{ $errors->has('mensagem') ? $errors->first('mensagem') : ''}}
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>
