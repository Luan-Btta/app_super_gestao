<div style="width: 30%; margin: 50px auto 0 auto">
    <form action="{{ route('app.fornecedor.listar') }}" method="POST">
        @csrf
        <input type="text" name="nome" placeholder="Nome" class="{{ $classe }}">
        <input type="text" name="site" placeholder="Site" class="{{ $classe }}">
        <input type="text" name="uf" placeholder="UF" class="{{ $classe }}">
        <input type="text" name="email" placeholder="Email" class="{{ $classe }}">
        <button type="submit">{{ $button }}</button>
    </form>
</div>