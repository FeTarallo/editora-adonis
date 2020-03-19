<?php

use Illuminate\Database\Seeder;

class PeriodTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('period')->insert([
            [
                "id"    => "1",
                "name"  => "Manhã"
            ],
            [
                "id"    => "2",
                "name"  => "Tarde"
            ],
            [
                "id"    => "3",
                "name"  => "Noite"
            ]
        ]);
    }
}
