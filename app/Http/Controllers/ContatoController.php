<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request) {
    
        /*
        print_r($request->all());
        echo $request->input('nome');
        echo '<br>';
        echo $request->input('email');
                
        
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');
        $contato->save();        

        $contato = new SiteContato();
        $contato->create($request->all());
        */

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato (Teste)', 'motivo_contatos' => $motivo_contatos]);

    }

    public function salvar(Request $request){
        //REALIZAR VALIDAÇÃO DOS DADOS RECEBIDOS NO REQUEST
        //AS CHAVES SÃO OS NAMES DOS INPUTS

        $regras = [
            //VALIDAÇÃO UNIQUE: PARÂMENTRO DEVE CONTER NOME DA TABELA NO BANCO COM O CHAVE/NAME
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            //NOMES COM MÍNIMO 3 CARACTERES E MÁXIMO 40
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedback = [
            'nome.min' => 'O campo nome precisa ter no mínimo 3 catacteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'nome.unique' => 'O nome informado já está em uso',
            'email' => 'O :attribute informado não é válido',

            'required' => 'O campo :attribute é obrigatório',
            'mensagem.max' => 'A mensagem deve ter no máximo 2000'
        ];

        $request->validate($regras, $feedback);

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
