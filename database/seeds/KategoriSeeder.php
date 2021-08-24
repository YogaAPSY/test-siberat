<?php

use App\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
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
                'name' => 'Alat Berat'
            ], [
                'id' => 2,
                'name' => 'Truck'
            ]
        ];
        return Kategori::insert($data);
    }
}
