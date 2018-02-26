<?php

use Illuminate\Database\Seeder;

class JournalsAuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('journals_authors')->insert([
            [
                'author_id' => '1',
                'journal_id' => '1',
            ],
            [
                'author_id' => '2',
                'journal_id' => '2',
            ],
            [
                'author_id' => '3',
                'journal_id' => '3',
            ],
            [
                'author_id' => '4',
                'journal_id' => '4',
            ]
        ]);
    }
}
