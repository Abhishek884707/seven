<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = date('d-m-y h:m:s');
        DB::insert('insert into users (name,email,password,created_at) values (?, ? , ?, ?)', ['Roger','Roger@gmail.com','12345',$time]);
    }
}
