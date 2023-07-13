<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Computer 
        DB::table('topics')->insert([
            'name' => 'Basic Computer',
            'subject_id' => 1,
        ]);

        DB::table('topics')->insert([
            'name' => 'Database Management System',
            'subject_id' => 1,
        ]);

        DB::table('topics')->insert([
            'name' => 'Operating System',
            'subject_id' => 1,
        ]);
        // English 
        DB::table('topics')->insert([
            'name' => 'Article',
            'subject_id' => 2,
        ]);

        DB::table('topics')->insert([
            'name' => 'Nouns',
            'subject_id' => 2,
        ]);

        DB::table('topics')->insert([
            'name' => 'Verbs',
            'subject_id' => 2,
        ]);

        // Quantitative Aptitude 
        DB::table('topics')->insert([
            'name' => 'Simplification',
            'subject_id' => 3,
        ]);

        DB::table('topics')->insert([
            'name' => 'Number System',
            'subject_id' => 3,
        ]);

        DB::table('topics')->insert([
            'name' => 'Average',
            'subject_id' => 3,
        ]);

        // Science 
        DB::table('topics')->insert([
            'name' => 'Chemistry',
            'subject_id' => 4,
        ]);

        DB::table('topics')->insert([
            'name' => 'Physics',
            'subject_id' => 4,
        ]);

        DB::table('topics')->insert([
            'name' => 'Biology',
            'subject_id' => 4,
        ]);

        // Science 
        DB::table('topics')->insert([
            'name' => 'Current Affairs',
            'subject_id' => 5,
        ]);

        DB::table('topics')->insert([
            'name' => 'Hystory',
            'subject_id' => 5,
        ]);

        DB::table('topics')->insert([
            'name' => 'Sports',
            'subject_id' => 5,
        ]);

        // Hindi 
        DB::table('topics')->insert([
            'name' => 'Samas',
            'subject_id' => 6,
        ]);

        DB::table('topics')->insert([
            'name' => 'Sandhi',
            'subject_id' => 6,
        ]);

        DB::table('topics')->insert([
            'name' => 'vyakaran',
            'subject_id' => 6,
        ]);

        // Management 
        DB::table('topics')->insert([
            'name' => 'Office Management',
            'subject_id' => 7,
        ]);

        DB::table('topics')->insert([
            'name' => 'Sales Management',
            'subject_id' => 7,
        ]);

        DB::table('topics')->insert([
            'name' => 'Product management',
            'subject_id' => 7,
        ]);
        
    }
}
