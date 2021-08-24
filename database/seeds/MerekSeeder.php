<?php

use App\Merek;
use Illuminate\Database\Seeder;

class MerekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'name' => 'Komatsu'
            ], [
                'id' => 2,
                'name' => 'Hino'
            ]
        ];
        return Merek::insert($data);
    }
}
