<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DoerTaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Doer::factory()->count(3)->create();

        $tasks = \App\Models\Task::factory()->count(3)->create();

        \App\Models\Doer::All()->each(function ($doer) use ($tasks){
            $doer->tasks()->saveMany($tasks);
        });
    }
}
