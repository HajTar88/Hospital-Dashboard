<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class patient extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patients')->insert([
            'patient_name'=>'Haj',
             'patient_code'=> 'POO2',
             'address'=>'KHT',
             'case'=> 'mm',
             'diagnosis'=>'nn',
             'password'=>'123456789',
             

        ]);
    }
}
