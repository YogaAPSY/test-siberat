<?php

use App\Jenis;
use Illuminate\Database\Seeder;

class JenisSeeder extends Seeder
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
                'name' => 'Excavator'
            ],
            [
                'id' => 2,
                'name' => 'Bulldozer'
            ],
            [
                'id' => 3,
                'name' => 'Motor Grader'
            ],
            [
                'id' => 4,
                'name' => 'Dump Truck'
            ],
            [
                'id' => 5,
                'name' => 'Trailer'
            ]
        ];
        return Jenis::insert($data);
    }
}
