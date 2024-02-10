<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeederl extends Seeder
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


        $file = fopen('C:\Users\tinas\Documents\GitHub\CORE\database\seeds\upload.csv', 'r');
        while (($line = fgetcsv($file)) !== FALSE) {
            //$line is an array of the csv elements
            array_push($a,$line);
        }

        fclose($file);

        // $id = 3053;

        foreach($a as $user){

            // $userexist = DB::table('users')->where('id', $id)->get();

            $memberidexist = DB::table('members')->where('id', $user[1])->get();
            // dd($user[2]);
            // if(!count($userexist)){
                // dd($userexist);
                DB::table('users')->insert([
                    'role_id'              =>       2  ,
                    'name'                 =>       $user[4]." ". $user[5],
                    'email'                =>       $user[2] ,
                    'avatar'               =>       "users/default.png"  ,
                    'email_verified_at'    =>       " 2022-12-01 00:00:00" ,
                    'password'             => Hash::make('password'),
                    'remember_token'       =>    NULL     ,
                    'settings'             =>      '{"locale":"en"}'   ,
                    'created_at'           =>      '2022-12-01 00:00:00 '  ,
                    'updated_at'           =>      '2022-12-01 00:00:00'   ,
                ]);

                $userexist = DB::table('users')->where('email', $user[2])->get();

                $d=strtotime($user[8]);
                $dob = date("Y-m-d h:i:sa", $d);
                print_r($dob);

                $d=strtotime($user[14]);
                $nok_dob = date("Y-m-d h:i:sa", $d);

                if(!count($memberidexist)){
                    DB::table('members')->insert([
                        'id'                   =>     $user[0]   ,
                        'created_at'           =>      "2022-12-01 00:00:00"   ,
                        'updated_at'           =>      '2022-12-01 00:00:00'  ,
                        'email'                =>       $user[2]  ,
                        'first_name'                 =>       $user[4],
                        'middle_names'                 =>       $user[3],
                        'last_name'                 =>      $user[5],

                        'dob'                 =>       $dob,
                        'city'                 =>       $user[7],
                        'country'                 =>       "United Kingdom",
                        'street'                 =>      $user[7],
                        'zip'                 =>       NULL,
                        'gender'                 =>      NULL,
                        'phone'                 =>      $user[9],
                        'nok_city'                 =>      NULL,
                        'nok_country'                 =>       NULL,
                        'nok_dob'                 =>       $nok_dob,
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
                    if($user[15]){
                        $d=strtotime($user[16]);
                        $dob = date("Y-m-d h:i:sa", $d);

                        DB::table('nominees')->insert([
                            'member_id'                   =>     $user[0]   ,
                            'full_name'           =>      $user[15]   ,
                            'dob'           =>      $dob
                        ]);
                    }
                    if($user[19]){
                        $d=strtotime($user[20]);
                        $dob = date("Y-m-d h:i:sa", $d);
                        DB::table('nominees')->insert([
                            'member_id'                   =>     $user[0]   ,
                            'full_name'           =>      $user[19]   ,
                            'dob'           =>      $dob
                        ]);
                    }

                    $d=strtotime($user[24]);
                    $dob = date("Y-m-d h:i:sa", $d);
                    if($user[23]){
                        DB::table('nominees')->insert([
                            'member_id'                   =>     $user[0]   ,
                            'full_name'           =>      $user[23]   ,
                            'dob'           =>      $dob
                        ]);
                    }

                    $d=strtotime($user[28]);
                    $dob = date("Y-m-d h:i:sa", $d);
                    if($user[27]){
                        DB::table('nominees')->insert([
                            'member_id'                   =>     $user[0]   ,
                            'full_name'           =>      $user[27]   ,
                            'dob'           =>      $dob
                        ]);
                    }
                }
                else{
                    array_push($idexists, $memberidexist);
                }

                // $id=$id+1;
            // }else{
            //     if(true){
            //         // dd($memberidexist);
            //         DB::table('members')->insert([
            //             'id'                   =>     $user[0]   ,
            //             'created_at'           =>      '2022-01-01 00:00:00'   ,
            //             'updated_at'           =>      '2022-01-01 00:00:00'  ,
            //             'email'                =>       $user[9]  ,
            //             'first_name'                 =>       $user[1],
            //             'middle_names'                 =>       NULL,
            //             'last_name'                 =>      $user[3],
            //             'dob'                 =>       $user[6],
            //             'city'                 =>       $user[5],
            //             'country'                 =>       "United Kingdom",
            //             'street'                 =>      $user[5],
            //             'zip'                 =>       NULL,
            //             'gender'                 =>      NULL,
            //             'phone'                 =>      $user[7],
            //             'nok_city'                 =>      NULL,
            //             'nok_country'                 =>       NULL,
            //             'nok_dob'                 =>       $user[11],
            //             'nok_email'                 =>       "",
            //             'nok_full_name'                 =>       $user[13],
            //             'nok_phone'                 =>       "",
            //             'nok_street'                 =>       NULL,
            //             'nok_zip'                 =>       NULL,
            //             'orderID'                 =>       NULL,
            //             'user_id'                 =>       $userexist[0]->id,
            //             'bio'                 =>       NULL,
            //             'balance'                 =>      0,


            //         ]);
            //     }else{
            //         array_push($exists, $userexist);
            //     }
            // }

        }

        dd($exists,$idexists);
    }
}
