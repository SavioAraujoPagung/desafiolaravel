<?php

use App\Models\Tarefa;
use Illuminate\Database\Seeder;

class TarefaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tarefa::class, 7)->create();
    }
}
