<?php

use Illuminate\Database\Seeder;

class LogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/json/logs.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            DB::table('logs')->insert(array(
                'user_id' => $obj->user_id,
                'type' => $obj->type,
                'revenue' =>$obj->revenue,
                'time'=>$obj->time

            ));
        }    
    }
}
