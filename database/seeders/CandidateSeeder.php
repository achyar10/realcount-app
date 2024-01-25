<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('candidates')->truncate();
        DB::table('candidates')->insert([
            [
                'sort_number' => '99',
                'name' => 'Suara Tidak Sah',
                'image' => null,
                'is_blank' => true,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'sort_number' => '01',
                'name' => 'Anies & Muhaimin',
                'image' => 'https://res.cloudinary.com/matik/image/upload/v1706154322/pemilu/anies_avvk15.png',
                'is_blank' => false,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'sort_number' => '02',
                'name' => 'Prabowo & Gibran',
                'image' => 'https://res.cloudinary.com/matik/image/upload/v1706154326/pemilu/prabowo_qwnz2g.png',
                'is_blank' => false,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'sort_number' => '03',
                'name' => 'Ganjar & Mahfud',
                'image' => 'https://res.cloudinary.com/matik/image/upload/v1706154325/pemilu/ganjar_ai3rdy.png',
                'is_blank' => false,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        ]);
    }
}
