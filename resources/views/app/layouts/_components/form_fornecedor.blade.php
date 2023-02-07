<div style="width: 30%; margin: 50px auto 0 auto">
    <form action="{{ route($metodo) }}" method="POST">
        @csrf
        <input type="text" name="nome" value="{{ old('nome') }}" placeholder="Nome" class="{{ $classe }}">
        {{$errors->has('nome') ? $errors->first('nome') : ''}}
        <input type="text" name="site" value="{{ old('site') }}" placeholder="Site" class="{{ $classe }}">
        {{$errors->has('site') ? $errors->first('site') : ''}}
        <input type="text" name="uf" value="{{ old('uf') }}" placeholder="UF" class="{{ $classe }}">
        {{$errors->has('uf') ? $errors->first('uf') : ''}}
        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="{{ $classe }}">
        {{$errors->has('email') ? $errors->first('email') : ''}}
        <button type="submit">{{ $button }}</button>
    </form>
</div>