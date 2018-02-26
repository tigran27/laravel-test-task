<?php

use Illuminate\Database\Seeder;

class JournalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('journals')->insert([
            [
            'title' => 'Clinical Science',
            'description' => '',
            'image' => 'Clinical.jpg',
            'journal_creation_date' => 'Cruz'
            ],
            [
            'title' => 'Physics',
            'description' => 'more recently with desktop',
            'image' => 'Physics.jpg',
            'journal_creation_date' => 'Cruz'
            ],
            [
            'title' => 'Agriculture',
            'description' => 'is simply dummy text of the printing',
            'image' => 'Agriculture.jpg',
            'journal_creation_date' => 'Cruz'
            ],
            [
            'title' => 'Botany',
            'description' => '',
            'image' => 'Botany.jpg',
            'journal_creation_date' => 'Cruz'
            ],
            [
            'title' => 'Chronobiology',
            'description' => 'when an unknown printer took a galley of type and scrambled',
            'image' => 'Chronobiology.jpg',
            'journal_creation_date' => 'Cruz'
            ],
            [
            'title' => 'Forestry',
            'description' => '',
            'image' => 'Forestry.jpg',
            'journal_creation_date' => 'Cruz'
            ],
        ]);
    }
}
