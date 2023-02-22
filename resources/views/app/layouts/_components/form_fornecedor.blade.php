<div style="width: 30%; margin: 50px auto 0 auto">
    <form action="{{ route($metodo) }}" method="POST">
        @csrf
        @if (isset($fornecedor->id) && $fornecedor->id != '')
            <input type="hidden" name="id" value="{{ $fornecedor->id }}">
        @endif
        <input type="text" name="nome" value="{{ $fornecedor->nome ?? old('nome') }}" placeholder="Nome" class="{{ $classe }}">
        {{$errors->has('nome') ? $errors->first('nome') : ''}}
        <input type="text" name="site" value="{{ $fornecedor->site ?? old('site') }}" placeholder="Site" class="{{ $classe }}">
        {{$errors->has('site') ? $errors->first('site') : ''}}
        <input type="text" name="uf" value="{{ $fornecedor->uf ?? old('uf') }}" minlength="2" maxlength="2" placeholder="UF" class="{{ $classe }}">
        {{$errors->has('uf') ? $errors->first('uf') : ''}}
        <input type="{{ $tipo }}" name="email" value="{{ $fornecedor->email ?? old('email') }}" placeholder="Email" class="{{ $classe }}">
        {{$errors->has('email') ? $errors->first('email') : ''}}
        <button type="submit">{{ $button }}</button>
    </form>
</div>