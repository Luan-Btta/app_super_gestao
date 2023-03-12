<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //CRIANDO COLUNA EM PRODUTOS PARA FK DE FORNECEDOR
        Schema::table('produtos', function(Blueprint $table){

            //INSERIR UM REGISTRO DE FORNECEDOR PARA ESTABELECER O RELACIONAMENTO
            $fornecedor_id = DB::table('fornecedores')->insertGetId([
                'nome' => 'Fornecedor Padrão',
                'site' => 'fornecedorpadrao.com.br',
                'uf' => 'MG',
                'email' => 'contato@fornecedorpadrao.com.br'
            ]);

            $table->unsignedBigInteger('fornecedor_id')->default($fornecedor_id)->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function(Blueprint $table){

            $table->dropForeign(['fornecedor_id']);
            $table->dropColumn('fornecedor_id');

        });

        $fornecedor = DB::table('fornecedores')->where('nome', 'Fornecedor Padrão')->where('email', 'contato@fornecedorpadrao.com.br');
        $fornecedor->delete();
    }
};
