<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pedido extends Model
{
    use HasFactory;

    public function produtos() :BelongsToMany
    {
        return $this->belongsToMany(Produto::class, 'pedidos_produtos')->withPivot('id');

        /*
            return $this->belongsToMany(Item::class, 'pedidos_produtos', 'pedido_id', 'produto_id');

            1- MODELO DO RELACIONAMENTO NxN EM RELAÇÃO AO MODELO QUE ESTAMOS IMPLEMENTANDO
            2- É A TABELA AUXILIAR QUE ARMAZENA OS REGISTROS DE RELACIONAMENTO
            3- REPRESENTA O NOME DA FK DA TABELA MAPEADA PELO MODELO NA TABELA DE RELACIONAMENTO
            4- REPRESENTA O NOME DA FK DA TABELA MAPEADA PELO MODEL UTILIZADO NO RELACIONAMENTO QUE ESTAMOS IMPLEMENTANDO

            
            return $this->belongsToMany(Produto::class, 'pedidos_produtos')->withPivot('created_at', 'updated_at);
        */
    }
}
