{{ $slot }}
<form action="{{ route('site.contato') }}" method="POST">
    @csrf
    <input type="text" name="nome" placeholder="Nome" value="{{ old('nome') }}" class="{{ $classe }}">
    <br>
    <input type="text" name="telefone" placeholder="Telefone" value="{{ old('telefone') }}" class="{{ $classe }}">
    <br>
    <input type="email" name="email" placeholder="E-mail" value="{{ old('email') }}" class="{{ $classe }}">
    <br>
    <select name="motivo_contato" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $motivo_contato)
            <option value="{{ $motivo_contato->id }}" {{ old('motivo_contato') == $motivo_contato->id ? 'selected' : '' }}>
                {{ $motivo_contato->motivo_contato }}</option>
        @endforeach
    </select>
    <br>
    <textarea name="mensagem" class="{{ $classe }}" placeholder="Preencha aqui sua mensagem">{{ old('mensagem') }}</textarea>
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>

<div style="position: absolute; top: 0px; left: 0px; width: 100%; background: red">
    <pre>
        {{ print_r($errors) }}
    <pre>
</div>
