<h3>Fornecedor</h3>

@php
    /*
        empty  retorna se a variável estiver vazia;
        - ''
        - 0
        - 0.0
        - '0'
        - null
        - false
        - array()
        - $var    
    */
@endphp

@isset($fornecedores)
    @forelse($fornecedores as $fornecedor)
        {{-- @dd($loop); --}}
        Iteração atual:  {{$loop->iteration}}
        <br>
        Fornecedor: {{$fornecedor['nome']}}
        <br>
        Status: @{{$fornecedor['status']}} <!-- @ ignora o comando de impressão do blade -->
        <br>
        CNPJ:  {{$fornecedor['cnpj'] ?? 'Não Informado'}}
        <br>
        Telefone:  ({{$fornecedor['ddd'] ?? ''}}) {{$fornecedor['telefone'] ?? ''}}
        <br>
        @switch($fornecedor['ddd'])
            @case('33')
                Cidade: Teófilo Otoni-MG
                @break
            @case('11')
                Cidade: São Paulo-SP
                @break
            @case('73')
                Cidade: Teixeira de Freitas-BA
                @break
            @default
                Cidade Não Localizada                
        @endswitch
        <br>
        @if($loop->first)
            Este é o primeiro fornecedor do sistema
        @elseif($loop->last)
            Este é o último fornecedor do sistema
            <br>
            Total de registros: {{$loop->count}}
        @endif
        <hr>
        @empty
            Não existem fornecedores cadastrados
    @endforelse

        <!-- SE A VARIAVEL TESTADA NÃO ESTIVER DEFINIDA (ISSET) OU ESTIVER VALOR NULL -->

        {{--

            @foreach ($fornecedores as $fornecedor)
                Fornecedor: {{$fornecedor['nome']}}
                <br>
                Status: {{$fornecedor['status']}}
                <br>
                CNPJ:  {{$fornecedor['cnpj'] ?? 'Não Informado'}}
                <br>
                Telefone:  ({{$fornecedor['ddd'] ?? ''}}) {{$fornecedor['telefone'] ?? ''}}
                <br>
                @switch($fornecedor['ddd'])
                    @case('33')
                        Cidade: Teófilo Otoni-MG
                        @break
                    @case('11')
                        Cidade: São Paulo-SP
                        @break
                    @case('73')
                        Cidade: Teixeira de Freitas-BA
                        @break
                    @default
                        Cidade Não Localizada                
                @endswitch
                <hr>
            @endforeach

        @isset($fornecedor['cnpj'])
            CNPJ:
            @empty($fornecedor['cnpj'])
                - Vazio
            @endempty
            {{$fornecedor['cnpj']}}
        @endisset
        
        @unless($fornecedor['status'] == 'S')  <!-- Retorna se a condição for false -->
            <br>Fornecedor Inativo
        @endunless
        --}}
@endisset


{{-- @dd($fornecedores) 'VARDUMP DO BLADE' --}}

{{--////////////////////////////////////////////////////////


@if(count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores cadastrados</h3>
@elseif(count($fornecedores)>10)
    <h3>Existem vários fornecedores cadastrados</h3>
@else
    <h3>Ainda não existem fornecedores cadastrados</h3>
@endif

{{-- Fica o comentário da sintaxe blade --}}

@php
    /*

    // Para comentários de uma linha

   
    Comentários de várias linhas
    

    echo "Teste sintaxe PHP";
    $x = 10;
    {{ $x }}

@endphp