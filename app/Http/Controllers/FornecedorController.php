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

    public function listar(Request $request, $msg = ''){
        
        $fornecedores = Fornecedor::
            where('nome', 'like', '%' . $request->input('nome') . '%')      
            ->where('site', 'like', '%' . $request->input('site') . '%')
            ->where('uf', 'like', '%' . $request->input('uf') . '%')
            ->where('email', 'like', '%' . $request->input('email') . '%')->paginate(2);

        //dd($fornecedores);

        return view('app.fornecedor.listar', ['titulo' => 'Fornecedor - Listar', 'classe' => 'borda-preta', 'fornecedores' => $fornecedores, 'msg' => $msg]);
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

            if($request->input('id') == ''){
                $fornecedor->create($request->all());

                $msg = 'Fornecedor cadastrado com sucesso';
            }else{
                $fornecedor = $fornecedor->find($request->input('id'));
                
                $update = $fornecedor->update($request->all());

                if($update){
                    $msg = 'Fornecedor atualizado com sucesso';
                    return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msg' => $msg]);
                }else{
                    $msg = 'Falha ao atualizar os dados, tente novamente';
                }

                return $this->listar($request, $msg);
                
            }

        };

        $fornecedor = '';

        return view('app.fornecedor.adicionar', ['button' => 'Cadastrar', 'titulo' => 'Fornecedor - Adicionar', 'classe' => 'borda-preta', 'msg' => $msg, 'fornecedor' => $fornecedor]);
    }

    public function editar($id, $msg = ''){
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', ['button' => 'Atualizar', 'titulo' => 'Fornecedor - Editar', 'classe' => 'borda-preta', 'fornecedor' => $fornecedor, 'msg' => $msg]);
    }

    public function excluir($id, request $request){
        $fornecedor = Fornecedor::find($id);
        //dd($fornecedor);

        if ($fornecedor) {
            $delete = $fornecedor->delete();
            $msg = 'Fornecedor removido com sucesso';
        } else {
            $msg = 'Falha ao remover registro, tente novamente';
        }

        return $this->listar($request, $msg);
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
