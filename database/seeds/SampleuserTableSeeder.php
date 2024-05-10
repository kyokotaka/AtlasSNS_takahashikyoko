<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class SampleuserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
      DB::table('users')->insert([
        ['username' =>'サンプル花子',
         'mail' =>'abcd@mail.com',
         'password' =>Hash::make('password')]
    ]);
    //DB::table('users')->insert($param);
        //
    }
}
