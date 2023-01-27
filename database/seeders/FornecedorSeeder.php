<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // DB::
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //INSTANCIANDO OBJ
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 10';
        $fornecedor->site = 'forn10.com.br';
        $fornecedor->uf = 'MG';
        $fornecedor->email = 'contato@forn10.com.br';
        $fornecedor->save();

        //CREATE NECESSITA DO FILLABLE DEFINIDO NO MODEL
        Fornecedor::create([
            'nome' => 'Fornecedor 20',
            'site' => 'forn20.com.br',
            'uf' => 'SP',
            'email' => 'contato20@forn20.com.br'
        ]);

        //INSERT NECESSITA DO USE FACADES/DB
        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 30',
            'site' => 'forn30.com.br',
            'uf' => 'RJ',
            'email' => 'contato@forn30.com.br'
        ]);

    }
}
