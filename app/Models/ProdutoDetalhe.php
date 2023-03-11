<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Produto;

class ProdutoDetalhe extends Model
{
    use HasFactory;
    protected $fillable = ['produto_id', 'comprimento', 'largura', 'altura', 'unidade_id'];

    public function Produto() :BelongsTo {
        return $this->BelongsTo(Produto::class);
    }
}