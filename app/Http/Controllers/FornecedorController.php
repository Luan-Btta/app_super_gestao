<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index', ['titulo' => 'Fornecedor', 'classe' => 'borda-preta']);
    }

    /*
    public function index(){
        $fornecedores = [
            0 => [
                'nome' => 'Coca Cola',
                'status' => 'N',
                'cnpj' => '00.000.000/0001-00',
                'ddd' => '11',
                'telefone' => '0000-0000'
            ],
            1 => [
                'nome' => 'Cheetos',
                'status' => 'S',
                'cnpj' => '0',
                'ddd' => '33',
                'telefone' => '9999-0000'
            ],
            2 => [
                'nome' => 'Itambé',
                'status' => 'S',
                'cnpj' => null,
                'ddd' => '73',
                'telefone' => '1111-0000'
            ]
        ];
        
        
        //return view('app.fornecedor.index', compact('fornecedores'));
        //return view('app.fornecedor.index');
    }*/
}
