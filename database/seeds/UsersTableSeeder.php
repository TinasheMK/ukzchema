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

        $file = fopen('C:\Users\tinas\Documents\GitHub\ukzchema\database\seeds\upload.csv', 'r');
        while (($line = fgetcsv($file)) !== FALSE) {
            //$line is an array of the csv elements
            array_push($a,$line);
        }

        fclose($file);


        foreach($a as $user){


            $memberidexist = DB::table('members')->where('id', $user[0])->get();
            $member = Member::find($user[0])->first();
            $user1 = User::find($member->user_id);
            if($user1){
                if($user[2]>0){
                    $user1->depositFloat($user[2]);
                    print_r("Nice");
                }
                if($user[2]<0){
                    $user1->forceWithdrawFloat(-1*$user[2], ['description' => 'payment for obituary']);

                    // $user1->forceWithdrawFloat($user[2]);
                    print_r("Nice");
                }

            }else{
                print_r($user[0]);
            }


        }


    }
}
