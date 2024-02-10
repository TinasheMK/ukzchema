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
        // $a=array();
        // $file = fopen('C:\Users\USER\Documents\GitHub\ukzchema\database\seeds\100old.csv', 'r');
        // while (($line = fgetcsv($file)) !== FALSE) {
        //     array_push($a,$line);
        // }
        // fclose($file);
        // foreach($a as $user){
        //         $d=strtotime($user[14]);
        //         $dob = date("Y-m-d h:i:sa", $d);
        //         if(true){
        //             if($user[15]){
        //                 $d=strtotime($user[14]);
        //                 $dob = date("Y-m-d h:i:sa", $d);

        //                 DB::table('nominees')->insert([
        //                     'member_id'                   =>     $user[0]   ,
        //                     'full_name'           =>      $user[11]   ,
        //                     'dob'           =>      $dob
        //                 ]);
        //             }
        //             if($user[19]){
        //                 $d=strtotime($user[20]);
        //                 $dob = date("Y-m-d h:i:sa", $d);
        //                 DB::table('nominees')->insert([
        //                     'member_id'                   =>     $user[0]   ,
        //                     'full_name'           =>      $user[19]   ,
        //                     'dob'           =>      $dob
        //                 ]);
        //             }
        //             if($user[23]){
        //                 $d=strtotime($user[24]);
        //                 $dob = date("Y-m-d h:i:sa", $d);
        //                 DB::table('nominees')->insert([
        //                     'member_id'                   =>     $user[0]   ,
        //                     'full_name'           =>      $user[23]   ,
        //                     'dob'           =>      $dob
        //                 ]);
        //             }
        //             if($user[27]){
        //                 $d=strtotime($user[28]);
        //                 $dob = date("Y-m-d h:i:sa", $d);
        //                 DB::table('nominees')->insert([
        //                     'member_id'                   =>     $user[0]   ,
        //                     'full_name'           =>      $user[27]   ,
        //                     'dob'           =>      $dob
        //                 ]);
        //             }
        //         }
        // }

        $members = Member::all();
        $count = 0;
        foreach($members as $m){
            if(count($m->nominees)>4){
                $count++;
                print($m->id);
                print(" (".$m->created_at.") ");
                print("  : nominee count ->");
                print(count($m->nominees));
                print("\n");
            }
        }
        print($count);
        print("\n");
    }
}
