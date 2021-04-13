<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
            'name' => 'Eu',
            'email' => 'eu@gmail.com',
            'password' => Hash::make('eu'),
            'chat_id' => '1349617668'
        ],
        [
            'name' => 'Luiz',
            'email' => 'nando1176@hotmail.com',
            'password' => Hash::make('luiz'),
            'chat_id' => '611639279'
        ],
        [
            'name' => 'Debbie',
            'email' => 'debbie@mail.com',
            'password' => Hash::make('debbie'),
            'chat_id' => '1056076358'
        ]]
    );
    }
}
