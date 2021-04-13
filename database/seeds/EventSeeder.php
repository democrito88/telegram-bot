<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            [
                'name'=> 'Reunião',
                'start_time'=>'2021-04-01 10:00:00',
                'end_time'=>'2021-04-01 11:00:00',
                'recurrence'=>''
            ],
            [
                'name'=> 'Atendimento 1',
                'start_time'=>'2021-04-08 10:00:00',
                'end_time'=>'2021-04-08 11:00:00',
                'recurrence'=>''
            ],
            [
                'name'=> 'Atendimento 2',
                'start_time'=>'2021-04-09 10:00:00',
                'end_time'=>'2021-04-10 11:00:00',
                'recurrence'=>''
            ],
        ]);
    }
}
