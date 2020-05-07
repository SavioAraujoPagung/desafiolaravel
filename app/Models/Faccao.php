<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faccao extends Model
{
    protected $fillable = ['nomeFantasia', 
                            'razaoSocial', 
                            'endereco',
                            'telefone',
                            'cnpj',
                            'situacao',];

                            
    public function search($filtro=null)
    {
        $results = $this->where(function($query) use($filtro)
            {
                
                if($filtro)
                {
                    $query->where('nomeFantasia', 'LIKE', "%{$filtro}%");
                }
            })->paginate(5);
            return $results;
    } 
}
