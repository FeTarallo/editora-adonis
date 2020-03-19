<?php

use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('course')->insert([
            [
                "id"    => "1",
                "name"  => "EFI | Ensino Fundamental I"
            ],
            [
                "id"    => "2",
                "name"  => "EFI | Ensino Fundamental II"
            ],
            [
                "id"    => "3",
                "name"  => "EM | Ensino Médio"
            ]
        ]);
    }
}
