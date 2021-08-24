<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QueryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /*
        Soal 2
        A.)
        SELECT m.id, k.name, (CONCAT(j.name," ", me.name, " ", m.name)) as name FROM `modells` AS m
        LEFT JOIN `kategoris` AS k ON k.id = m.kategori_id
        LEFT JOIN `jenis` AS j ON j.id = m.jenis_id
        LEFT JOIN `mereks` AS me ON me.id = m.merek_id

        B.)
        SELECT m.id, k.name, (CONCAT(j.name," ", me.name, " ", m.name)) as name FROM `modells` AS m
        LEFT JOIN `kategoris` AS k ON k.id = m.kategori_id
        LEFT JOIN `jenis` AS j ON j.id = m.jenis_id
        LEFT JOIN `mereks` AS me ON me.id = m.merek_id
        WHERE k.name = 'Alat Berat'

        C.)
        SELECT m.id, k.name, (CONCAT(j.name," ", me.name, " ", m.name)) as name FROM `modells` AS m
        LEFT JOIN `kategoris` AS k ON k.id = m.kategori_id
        LEFT JOIN `jenis` AS j ON j.id = m.jenis_id
        LEFT JOIN `mereks` AS me ON me.id = m.merek_id
        WHERE j.name = 'Dump Truck' AND me.name = 'Hino'

        D.)
        SELECT m.id, k.name, (CONCAT(j.name," ", me.name, " ", m.name)) as nama FROM `modells` AS m
        LEFT JOIN `kategoris` AS k ON k.id = m.kategori_id
        LEFT JOIN `jenis` AS j ON j.id = m.jenis_id
        LEFT JOIN `mereks` AS me ON me.id = m.merek_id
        WHERE me.name = 'Komatsu' AND m.name LIKE '%D%'


    */
    public function getFullNameAttribute()
    {
        if (Auth::user() && Auth::user()->hasRole('client') && Auth::user()->isVerified()) return "Mr {$this->firs_name} {$this->middle_name} {$this->last_name}";

        return "{$this->first_name} {$this->last_name}";
    }

    public function bilanganPrima($n)
    {
        $prima = [];
        for ($i = 1; $i <= $n; $i++) {
            $cekPrima = 0;
            for ($j = 1; $j <= $i; $j++) {
                if ($i % $j == 0) {
                    $cekPrima++;
                }
            }
            if ($cekPrima == 2) {
                $prima[] = $i;
            }
        }

        return response()->json([
            'statusCode' => 200,
            'success' => true,
            'data' => $prima
        ]);
    }

    public function stringCount()
    {
        $string = 'siberatdigitallogistik';
        $split = str_split($string);
        $split_unique = array_unique($split);
        asort($split_unique);
        foreach ($split_unique as $s) {
            $count = substr_count($string, $s);

            $result[$s] = $count;
        }
        return response()->json([
            'statusCode' => 200,
            'success' => true,
            'data' => $result
        ]);
    }
}
