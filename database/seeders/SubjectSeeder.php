<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('subjects')->insert([
            'name' => 'Computer',           
        ]);

        DB::table('subjects')->insert([
            'name' => 'English',           
        ]); 
        
        DB::table('subjects')->insert([
            'name' => 'Quantative Aptitude',           
        ]);
        
        DB::table('subjects')->insert([
            'name' => 'Science',           
        ]);
        
        DB::table('subjects')->insert([
            'name' => 'General Knowledge',           
        ]);

        DB::table('subjects')->insert([
            'name' => 'Hindi',           
        ]);

        DB::table('subjects')->insert([
            'name' => 'Management',           
        ]);
         
    }
}
