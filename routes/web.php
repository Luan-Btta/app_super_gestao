<?php

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

Route::get('/', 'App\Http\Controllers\PrincipalController@principal')->name('site.index');
Route::get('/sobrenos', 'App\Http\Controllers\SobreNosController@sobreNos')->name('site.sobrenos');
Route::get('/contato', 'App\Http\Controllers\ContatoController@contato')->name('site.contato');
Route::post('/contato', 'App\Http\Controllers\ContatoController@salvar')->name('site.contato');
Route::get('/login', function(){return 'Login';})->name('site.login');

Route::prefix('/app')->group(function() {
    Route::get('/clientes', function(){return 'Clientes';})->name('app.clientes');
    Route::get('/fornecedores', 'App\Http\Controllers\FornecedorController@index')->name('app.fornecedores');
    Route::get('/produtos', function(){return 'Produtos';})->name('app.produtos');
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