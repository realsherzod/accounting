<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
['title' => "1-xona", 'description'=> 'Bu 1-xona'],
['title' => "2-xona", 'description'=> 'Bu 2-xona'],
        ];
        foreach($data as $name){
            DB::table('questions')->insert($name);
        }
    }
}
