<?php

use App\Models\Applicant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ApplicantTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $id = 205;
        $applicant = [];
        $app = false;

        for($x = 0; $x <= 3000 ; $x++){

            try{

                $app = DB::table('applicants')->where('id', $id)->get()[0];
            }catch(exception $e){

            }

            // dd($app);
            if($app){

                $applicant = DB::table('applicants')->where('email', $app->email)->get();
                $tog = false;
                foreach ($applicant as $a) {
                    if($tog){
                        Applicant::find($a->id)->delete();
                    }
                    else{
                        $tog = true;
                    }

                }

            }

            $id++;
        }
        // dd($id);

    }
}
