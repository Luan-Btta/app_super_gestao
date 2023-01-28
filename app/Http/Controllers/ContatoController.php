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

        $request->validate([
            'nome' => 'required|min:3|max:40', //NOMES COM MÍNIMO 3 CARACTERES E MÁXIMO 40
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required',
        ]);

        //SiteContato::create($request->all());
    }
}
