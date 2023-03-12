<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProdutoDetalhe;
use App\Models\Fornecedor;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Produto extends Model
{
    use HasFactory;
    protected $fillable = ['fornecedor_id', 'nome', 'descricao', 'peso', 'unidade_id'];

    /**
     * Get the ProdutoDetalhe associated with the Produto
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function produtoDetalhe(): HasOne
    {
        return $this->hasOne(ProdutoDetalhe::class, 'produto_id', 'id');
    }

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class, 'fornecedor_id', 'id');
    }
}