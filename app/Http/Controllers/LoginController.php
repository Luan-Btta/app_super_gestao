<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    //
    public function index(Request $request){
        $erro = '';
        $erro = $request->get('erro');
        
        if($erro == 1){
            $erro = 'Login ou senha incorretos, tente novamente';
        }else if($erro == 2){
            $erro = 'Efetue login para acessar esta página';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
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

        //RECUPERA OS PARAMETROS DO FORM
        $email = $request->get('usuario');
        $password = $request->get('senha');

        $request->validate($regras, $feedback);

        //INICIAR O MODEL USER
        $user = new User();

        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();

        if(isset($usuario->name)){
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            return redirect()->route('app.home');
            
        }else{
            return redirect()->route('site.login',['erro' => 1]);
        }

        /*echo "<pre>";
        print_r($usuario);
        */
    }

    public function sair(){
        echo 'Sair';
    }
}
