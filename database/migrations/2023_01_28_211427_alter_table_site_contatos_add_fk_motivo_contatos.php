<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //CRIANDO A COLUNA MOTIVO_CONTATOS_ID
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contatos_id');
        });

        //ATRIBUINDO MOTIVO_CONTATO PARA A NOVA COLUNA MOTIVO_CONTATOS_ID
        //PERMITE EXECUTAR UMA QUERY
        DB::statement(
            'UPDATE site_contatos SET motivo_contatos_id = motivo_contato'
        );

        //CRIAÇÃO DA FK
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo_contato');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //CRIANDO A COLUNA MOTIVO_CONTATO
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->integer('motivo_contato');
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
        });

        DB::statement(
            'UPDATE site_contatos SET motivo_contato = motivo_contatos_id'
        );

        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropColumn('motivo_contatos_id');
        });
    }
};
