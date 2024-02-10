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

        $members = Member::all();
        foreach($members as $m){
            print(count($m->nominees));
            // if($m->user == null){
            //     print_r(" user ->");
            //     print_r($m->user_id);
            //     print_r(" member ->");

            //     print_r($m->id);
            //     print_r(" \n");

            //     $m->delete();

            // }else{
            //     print_r($m->id);
            // }

        }

    }
}
