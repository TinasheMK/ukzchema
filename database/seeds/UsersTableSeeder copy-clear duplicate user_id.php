<?php

use App\Models\Member;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $userIds = [];

        $members = Member::all();

        foreach($members as $m){
            if(in_array($m->user_id, $userIds)){
                print_r(" user ->");
                print_r($m->user_id);
                print_r(" member ->");

                print_r($m->id);
                print_r(" \n");

            }else{
                array_push($userIds,$m->user_id);
                // print_r($m->user_id);
                // print_r(" ");



            }
        }
        // print_r($userIds);

    }
}
