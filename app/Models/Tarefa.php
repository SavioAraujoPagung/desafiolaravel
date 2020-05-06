<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $fillable = ['nome', 'descricao', 'tempoMedio', 'custo'];

    public function search($filtro=null)
    {
        $results = $this->where(function($query) use($filtro)
            {
                if($filtro)
                {
                    $query->where('nome', 'LIKE', "%{$filtro}%");
                }
            })->paginate(5);
            return $results;
    } 
}
