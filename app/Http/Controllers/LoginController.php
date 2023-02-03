<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index(){
        return view('site.login', ['titulo' => 'Login']);
    }

    public function autenticar(Request $request){
        //REGRAS DE VALIDAÇÃO
        $regras = [
            'usuario' => 'email', 
            'senha' => 'required'
        ];

        $feedback = [
            'email' => 'É necessário inseir um e-mail/login válido',
            'required' => 'O campo :attribute é obrigatório'

        ];

        $request->validate($regras, $feedback);
        print_r($request->all());
    }
}
