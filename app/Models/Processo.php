<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Processo extends Model
{
    protected $fillable = [ 'tarefa',
                            'faccao',
                            'modelo',
                            'quantidade',
                        ];

    public function search($filtro=null)
    {
        $results = $this->where(function($query) use($filtro)
            {
                
                if($filtro)
                {
                    $query->where('faccao', 'LIKE', "%{$filtro}%");
                }
            })->paginate(5);
            return $results;
    } 
}
