<?php

use App\Http\Middleware\AutenticacaoMiddleware;
use App\Http\Middleware\LogAcessoMiddleware;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//middleware(LogAcessoMiddleware::class)->
Route::get('/', 'App\Http\Controllers\PrincipalController@principal')->name('site.index');

Route::get('/sobrenos', 'App\Http\Controllers\SobreNosController@sobreNos')->name('site.sobrenos');

Route::get('/contato', 'App\Http\Controllers\ContatoController@contato')->name('site.contato');
//->middleware(LogAcessoMiddleware::class)

Route::post('/contato', 'App\Http\Controllers\ContatoController@salvar')->name('site.contato');

Route::get('/login/{erro?}', 'App\Http\Controllers\LoginController@index')->name('site.login');
Route::post('/login', 'App\Http\Controllers\LoginController@autenticar')->name('site.login');


//middleware('log.acesso', 'autenticacao')->
//Route::middleware('autenticacao:ldap, colaborador')->prefix('/app')->group(function() {
Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function() {
    Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('app.home');

    Route::get('/sair', 'App\Http\Controllers\LoginController@sair')->name('app.sair');
    
    Route::get('/cliente', 'App\Http\Controllers\ClienteController@index')->name('app.cliente');


    Route::get('/fornecedor', 'App\Http\Controllers\FornecedorController@index')->name('app.fornecedor');
    Route::post('/fornecedor/listar', 'App\Http\Controllers\FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', 'App\Http\Controllers\FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', 'App\Http\Controllers\FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}', 'App\Http\Controllers\FornecedorController@editar')->name('app.fornecedor.editar');




    Route::get('/produto', 'App\Http\Controllers\ProdutoController@index')->name('app.produto');
});

Route::get('/teste/{p1}/{p2}', 'App\Http\Controllers\TesteController@teste')->name('teste');

Route::fallback(function(){
    echo 'A rota acessada não existe. Clique <a href="'.route('site.index').'">aqui</a> para ir para o início';
});

/*
Route::get('/rota1', function(){
    echo 'Rota 1';
})->name('site.rota1');

Route::get('/rota2', function(){
    return redirect()->route('site.rota1');
})->name('site.rota2');
// Route::redirect('/rota2', '/rota1');

Route::fallback(function(){
    echo 'A rota acessada não existe. Clique <a href="'.route('site.index').'">aqui</a> para ir para o início';
});



 
Route::get('/rota2', function(){
    echo 'Rota 2';
})->name('site.rota2');


// nome, categoria, assunto, mensagem
Route::get('/contato/{nome}/{categoria_id}', function (string $nome = 'Desconhecido', int $categoria_id = 1) { // 1 -Informação
    echo 'Estamos aqui: '.$nome.' - '.$categoria_id;
})->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+');


Route::get('/contato/{nome?}/{categoria?}/{assunto?}/{mensagem?}', function (string $nome = 'Desconhecido', string $categoria = 'Informação', string $assunto = 'Contato', string $mensagem='Mensagem não informada') {
    echo 'Estamos aqui: '.$nome.' - '.$categoria.' - '.$assunto.' - '.$mensagem;
});

Route::get('/contato/{nome}/{y}/', function (string $xyz, string $categoria) {
    echo 'Estamos aqui: '.$xyz. ' - '.$categoria;
});

Route::get('/', function () {
    return "Olá, seja bem vinndo ao curso!";
});

Route::get('/sobrenos', function () {
    return "Sobre nós";
});

Route::get('/contato', function () {
    return "Contato";
});

--------------------------------------
Route::get($uri, $callback);

--------------------------------------
VERBOS

http
post
put
patch
delete
options
*/