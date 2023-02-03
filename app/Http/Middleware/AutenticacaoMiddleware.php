<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao, $perfil)
    {
        if($metodo_autenticacao == 'padrao'){
            echo 'Verificar o usuário e senha no banco de dados - '.$perfil.'<br>';
        }else if($metodo_autenticacao== 'ldap'){
            echo 'Verificar o usuário e senha no AD - '.$perfil.'<br>';
        }

        if($perfil == 'visitante'){
            echo 'Exibir apenas alguns recursos<br>';
        }else{
            echo 'Carregar perfil no BD<br>';
        }

        //VERIFICA SE O USUÁRIO POSSUI ACESSO A ROTA
        if(false){
            return $next($request);
        }else{
            return Response('Acesso negado! Rota exige autenticação!<br>');
        }        
    }
}
