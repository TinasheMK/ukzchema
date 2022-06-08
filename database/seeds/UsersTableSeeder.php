<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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


        $file = fopen('C:\Users\tinas\Documents\GitHub\ukzchema\database\seeds\100users.csv', 'r');
        while (($line = fgetcsv($file)) !== FALSE) {
            //$line is an array of the csv elements
            array_push($a,$line);
        }
        // dd($a);
        fclose($file);

        $id = 2822;

        foreach($a as $user){

            $userexist = DB::table('users')->where('email', $user[2])->get();
            $memberidexist = DB::table('members')->where('id', $user[0])->get();

            if(!count($userexist)){
                // dd($userexist);
                DB::table('users')->insert([
                    'id'                   =>     $id    ,
                    'role_id'              =>       2  ,
                    'name'                 =>       $user[4]." ". $user[5],
                    'email'                =>       $user[2] ,
                    'avatar'               =>       "users/default.png"  ,
                    'email_verified_at'    =>       " 2022-01-01 00:00:00" ,
                    'password'             => Hash::make('password'),
                    'remember_token'       =>    NULL     ,
                    'settings'             =>      '{"locale":"en"}'   ,
                    'created_at'           =>      '2022-01-01 00:00:00 '  ,
                    'updated_at'           =>      '2022-01-01 00:00:00'   ,
                ]);
                if(!count($memberidexist)){
                    DB::table('members')->insert([
                        'id'                   =>     $user[0]   ,
                        'created_at'           =>      '2022-01-01 00:00:00'   ,
                        'updated_at'           =>      '2022-01-01 00:00:00'  ,
                        'email'                =>       $user[2]  ,
                        'first_name'                 =>       $user[4],
                        'middle_names'                 =>       NULL,
                        'last_name'                 =>      $user[5],
                        'dob'                 =>       $user[8],
                        'city'                 =>       $user[7],
                        'country'                 =>       "United Kingdom",
                        'street'                 =>      $user[7],
                        'zip'                 =>       NULL,
                        'gender'                 =>      NULL,
                        'phone'                 =>      $user[9],
                        'nok_city'                 =>      NULL,
                        'nok_country'                 =>       NULL,
                        'nok_dob'                 =>       $user[14],
                        'nok_email'                 =>       $user[12],
                        'nok_full_name'                 =>       $user[11],
                        'nok_phone'                 =>       $user[13],
                        'nok_street'                 =>       NULL,
                        'nok_zip'                 =>       NULL,
                        'orderID'                 =>       NULL,
                        'user_id'                 =>       $id,
                        'bio'                 =>       NULL,
                        'balance'                 =>      0,


                    ]);
                }
                else{
                    array_push($idexists, $memberidexist);
                }

                $id=$id+1;
            }else{
                if(!count($memberidexist)){
                    // dd($memberidexist);
                    DB::table('members')->insert([
                        'id'                   =>     $user[0]   ,
                        'created_at'           =>      '2022-01-01 00:00:00'   ,
                        'updated_at'           =>      '2022-01-01 00:00:00'  ,
                        'email'                =>       $user[2]  ,
                        'first_name'                 =>       $user[4],
                        'middle_names'                 =>       NULL,
                        'last_name'                 =>      $user[5],
                        'dob'                 =>       $user[8],
                        'city'                 =>       $user[7],
                        'country'                 =>       "United Kingdom",
                        'street'                 =>      $user[7],
                        'zip'                 =>       NULL,
                        'gender'                 =>      NULL,
                        'phone'                 =>      $user[9],
                        'nok_city'                 =>      NULL,
                        'nok_country'                 =>       NULL,
                        'nok_dob'                 =>       $user[14],
                        'nok_email'                 =>       $user[12],
                        'nok_full_name'                 =>       $user[11],
                        'nok_phone'                 =>       $user[13],
                        'nok_street'                 =>       NULL,
                        'nok_zip'                 =>       NULL,
                        'orderID'                 =>       NULL,
                        'user_id'                 =>       $userexist[0]->id,
                        'bio'                 =>       NULL,
                        'balance'                 =>      0,


                    ]);
                }else{
                    array_push($exists, $userexist);
                }
            }

        }

        dd($exists,$idexists);
    }
}
