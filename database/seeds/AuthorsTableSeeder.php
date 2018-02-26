<?php

use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert([
            [
                'first_name' => 'Waylon',
                'last_name' => 'Dalton',
                'middle_name' => 'Cruz'
            ],
            [
                'first_name' => 'Marcus ',
                'last_name' => 'Cruz',
                'middle_name' => 'Randolph'
            ],
            [
                'first_name' => 'Eddie',
                'last_name' => 'Randolph',
                'middle_name' => 'Hartman'
            ],
            [
                'first_name' => 'Justine',
                'last_name' => 'Henderson',
                'middle_name' => 'Cobb'
            ],
            [
                'first_name' => 'Thalia',
                'last_name' => 'Cobb',
                'middle_name' => 'Walker'
            ],
        ]);
    }
}
