<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PaperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('papers')->insert([
            'paper_name' => 'patwari-001-2023',
            'paper_type' =>1,
            'available' => 1,
        ]);
        DB::table('papers')->insert([
            'paper_name' => 'patwari-002-2023',
            'paper_type' =>1,
            'available' => 1,
        ]);
        DB::table('papers')->insert([
            'paper_name' => 'patwari-003-2023',
            'paper_type' =>1,
            'available' => 1,
        ]); DB::table('papers')->insert([
            'paper_name' => 'patwari-004-2023',
            'paper_type' =>1,
            'available' => 1,
        ]);
    }
    }

