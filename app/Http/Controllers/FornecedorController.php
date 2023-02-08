<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index(){
        return view('app.fornecedor.index', ['titulo' => 'Fornecedor', 'classe' => 'borda-preta']);
    }

    public function listar(Request $request){
        $fornecedores = Fornecedor::where('nome', 'like', '%' . $request->input('nome') . '%')->where('site', 'like', '%' . $request->input('site') . '%')
            ->where('uf', 'like', '%' . $request->input('uf') . '%')
            ->where('email', 'like', '%' . $request->input('email') . '%')->get();
        
        return view('app.fornecedor.listar', ['titulo' => 'Fornecedor - Listar', 'classe' => 'borda-preta', 'fornecedores' => $fornecedores]);
    }

    public function adicionar(Request $request){
        $msg = '';
        
        if($request->input('_token') != ''){
            $regras = [
                'nome' => 'required|min:3|max:40',
                'site' => 'required',
                'uf' => 'required|min:2|max:2',
                'email' => 'email'
            ];

            $feedback = [
                'required' => 'O campo :attribute é obrigatório',
                'nome.min' => 'O campo :attribute precisa ter 3 caracteres ou mais',
                'nome.max' => 'O campo :attribute tem limite de 40 caracteres',
                'uf' => 'O campo :attribute deve ter 2 caracteres',
                'email' => 'Favor inserir um :attribute válido'
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = 'Fornecedor cadastrado com sucesso';

        };

        return view('app.fornecedor.adicionar', ['titulo' => 'Fornecedor - Adicionar', 'classe' => 'borda-preta', 'msg' => $msg]);
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
