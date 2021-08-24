<?php

use App\Modell;
use Illuminate\Database\Seeder;

class ModelSeeder extends Seeder
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
                'kategori_id' => 1,
                'merek_id' => 1,
                'jenis_id' => 1,
                'name' => 'PC200-8'
            ],
            [
                'id' => 2,
                'kategori_id' => 1,
                'merek_id' => 1,
                'jenis_id' => 2,
                'name' => 'D8R'
            ],
            [
                'id' => 3,
                'kategori_id' => 1,
                'merek_id' => 1,
                'jenis_id' => 3,
                'name' => 'GD750-4'
            ],
            [
                'id' => 4,
                'kategori_id' => 2,
                'merek_id' => 2,
                'jenis_id' => 4,
                'name' => 'FM260JD'
            ],
            [
                'id' => 5,
                'kategori_id' => 2,
                'merek_id' => 2,
                'jenis_id' => 5,
                'name' => 'FM320JD'
            ]
        ];
        return Modell::insert($data);
    }
}
