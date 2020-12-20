<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/json/users.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            DB::table('users')->insert(array(
                'id' => $obj->id,
                'name' => $obj->name,
                'avatar' => $obj->avatar,
                'occupation' =>$obj->occupation

            ));
        }
    }
}
