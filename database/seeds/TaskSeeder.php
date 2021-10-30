<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        // DB::statment('SET FOREIGN_KEY_CHECKS=0');

        // DB::table('tasks')->insert([
        //     'title' => 'uzduotis1',
        //     'description' => 'aprasymas1',
        //      'type_id'=> rand(1,4),
        //     'start_date'=>date('y-m-d'),
        //     'end_date'=>date('y-m-d'),
        //     'logo'=>Str::random(20),

        // ]);

        // DB::table('tasks')->insert([
        //     'title' => 'uzduotis2',
        //     'description' => 'aprasymas2',
        //      'type_id'=> rand(1,4),
        //     'start_date'=>date('y-m-d'),
        //     'end_date'=>date('y-m-d'),
        //     'logo'=>Str::random(20),

        // ]);

        // DB::table('tasks')->insert([
        //     'title' => 'uzduotis3',
        //     'description' => 'aprasymas3',
        //      'type_id'=> rand(1,4),
        //     'start_date'=>date('y-m-d'),
        //     'end_date'=>date('y-m-d'),
        //     'logo'=>Str::random(20),

        // ]);
        // DB::table('tasks')->insert([
        //     'title' => 'uzduotis4',
        //     'description' => 'aprasymas4',
        //      'type_id'=> rand(1,4),
        //     'start_date'=>date('y-m-d'),
        //     'end_date'=>date('y-m-d'),
        //     'logo'=>Str::random(20),

        // ]);
        // DB::table('tasks')->insert([
        //     'title' => 'uzduotis5',
        //     'description' => 'aprasymas5',
        //      'type_id'=> rand(1,4),
        //     'start_date'=>date('y-m-d'),
        //     'end_date'=>date('y-m-d'),
        //     'logo'=>Str::random(20),

        // ]);
        // DB::table('tasks')->insert([
        //     'title' => 'uzduotis6',
        //     'description' => 'aprasymas6',
        //      'type_id'=> rand(1,4),
        //     'start_date'=>date('y-m-d'),
        //     'end_date'=>date('y-m-d'),
        //     'logo'=>Str::random(20),

        // ]);
        // DB::table('tasks')->insert([
        //     'title' => 'uzduotis7',
        //     'description' => 'aprasymas7',
        //      'type_id'=> rand(1,4),
        //     'start_date'=>date('y-m-d'),
        //     'end_date'=>date('y-m-d'),
        //     'logo'=>Str::random(20),

        // ]);
        // DB::table('tasks')->insert([
        //     'title' => 'uzduotis8',
        //     'description' => 'aprasymas8',
        //      'type_id'=> rand(1,4),
        //     'start_date'=>date('y-m-d'),
        //     'end_date'=>date('y-m-d'),
        //     'logo'=>Str::random(20),

        // ]);
        // DB::table('tasks')->insert([
        //     'title' => 'uzduotis9',
        //     'description' => 'aprasymas9',
        //      'type_id'=> rand(1,4),
        //     'start_date'=>date('y-m-d'),
        //     'end_date'=>date('y-m-d'),
        //     'logo'=>Str::random(20),

        // ]);
        // DB::table('tasks')->insert([
        //     'title' => 'uzduotis10',
        //     'description' => 'aprasymas10',
        //      'type_id'=> rand(1,4),
        //     'start_date'=>date('y-m-d'),
        //     'end_date'=>date('y-m-d'),
        //     'logo'=>Str::random(20),

        // ]);
        // DB::table('tasks')->insert([
        //     'title' => 'uzduotis11',
        //     'description' => 'aprasymas11',
        //      'type_id'=> rand(1,4),
        //     'start_date'=>date('y-m-d'),
        //     'end_date'=>date('y-m-d'),
        //     'logo'=>Str::random(20),

        // ]);
        // DB::statment('SET FOREIGN_KEY_CHECKS=1');
        factory(Task::class, 150)->create();

    }
}
