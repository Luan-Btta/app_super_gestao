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
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5); //cm, mm, kg
            $table->string('descricao', 30);
            $table->timestamps();
        });

        //ADICIONAR O RELACIONAMENTO COM A TABELA PRODUTOS
        Schema::table('produtos', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        //ADIONAR O RELACIONAMENTO COM A TABELA PRODUTOS DETALHES
        Schema::table('produto_detalhes', function (Blueprint $table) {
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //REMOVER O RELACIONAMENTO COM A TABELA PRODUTOS DETALHES
        Schema::table('produto_detalhes', function (Blueprint $table) {
            //REMOVER A FK
            $table->dropForeign('produto_detalhes_unidade_id_foreign'); //[TABELA]_[COLUNA]_FOREIGN
           
            //REMOVER A COLUNA
            $table->dropColumn('unidade_id');
        });

        //REMOVER O RELACIONAMENTO COM A TABELA PRODUTOS
        Schema::table('produtos', function (Blueprint $table) {
            //REMOVER A FK
            $table->dropForeign('produtos_unidade_id_foreign'); //[TABELA]_[COLUNA]_FOREIGN
           
            //REMOVER A COLUNA
            $table->dropColumn('unidade_id');
        });
        
        Schema::dropIfExists('unidades');
    }
};
