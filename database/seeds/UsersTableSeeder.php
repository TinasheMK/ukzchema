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
        $a=array();
        $exists=array();
        $idexists=array();

        $file = fopen('C:\Users\USER\Documents\GitHub\client\ukzchema\database\seeds\upload.csv', 'r');
        while (($line = fgetcsv($file)) !== FALSE) {
            //$line is an array of the csv elements
            array_push($a,$line);
        }

        fclose($file);

        foreach($a as $user){

            $old = explode('/', $user[1]);

            $newdate = $old[2]."/".$old[1]."/".$old[0];

            $joined = strtotime($newdate);

            print_r("Date");
            print_r($joined );
            print_r("    ");

            $member = Member::find($user[0]);
            $member->created_at = $joined;
            $member->save;
            if($member ==null){
                print_r($user[0]);
            }
            print_r($member->id);

            $user1 = User::find($member->user_id);
            if($user1){
                if($user[2]>0){
                    $user1->depositFloat($user[2]);
                    print_r(" $user1->id");
                    print_r(" $user1->balanceFloat");
                    print_r(" \n");

                }
                if($user[2]<0){
                    $user1->forceWithdrawFloat(-1*$user[2], ['description' => 'payment for obituary']);

                    // $user1->forceWithdrawFloat($user[2]);
                    print_r(" $user1->id");
                    print_r(" $user1->balanceFloat");
                    print_r(" \n");

                }

            }else{
                print_r($user[0]);
                print_r("Not found");
            }


        }


    }
}
