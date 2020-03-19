<?php

use Illuminate\Database\Seeder;

class LevelTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('level')->insert([
            [
                "id"    => "1",
                "name"  => "Administrador"
            ],
            [
                "id"    => "2",
                "name"  => "Escola"
            ],
            [
                "id"    => "3",
                "name"  => "Professor"
            ],
            [
                "id"    => "4",
                "name"  => "Usuário Comum"
            ]
        ]);
    }
}
