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
        $memberids = ["CM0000000220", "CM001145" , "002862", "CM001553", "CM001568" ,"002863", "CM0000000348", "CM000679","CM000681" , "CM00000004", "CM0000000348", "CM00000004", "CM000558"];
        $userids = ["3349" ];
        // $memberstolink = ["CM00000004"];

        // foreach($memberids as $m){
        //     $member = Member::find($m);
        //     if($member != null){
        //         $member->delete();
        //     }
        // }

        $members = Member::all();

        foreach($members as $m){
            if($m->user == null){
                print_r(" user ->");
                print_r($m->user_id);
                print_r(" member ->");

                print_r($m->id);
                print_r(" \n");

                $m->delete();

            }else{
                // print_r($m->id);
            }

        }

    }
}
