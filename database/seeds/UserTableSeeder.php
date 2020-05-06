<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create();
        /*
        User::create([
            'name' => 'Savio Araujo Pagung',
            'email' => 'savio.pagung@hotmail.com',
            'password' => bcrypt('123456'),
        ]);
        */
    }
}
