<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('city')->insert([
            'name'=>'Sài Gòn',
            'code'=>'SGN'
        ]);
        DB::table('city')->insert([
            'name'=>'Hà Nội',
            'code'=>'HN'
        ]);
        DB::table('city')->insert([
            'name'=>'Đã Nẵng',
            'code'=>'DNG'
        ]);

        DB::table('airline_org')->insert([
            'name' => 'VietNam Airlines',
            'code' => 'VNAL'
        ]);
        DB::table('airline_org')->insert([
            'name' => 'Quatar Airlines',
            'code' => 'QAL'
        ]);
        DB::table('airline_org')->insert([
            'name' => 'Korean Airlines',
            'code' => 'KAL'
        ]);


//            org_id	from	to	duration	transit
        DB::table('flight')->insert([
            'org_id' => 1,
            'from' => 1,
            'to' => 2,
            'flight_type' => 2,
            'departure'=>'2019-01-01 04:30',
            'return'=>'2019-01-02 07:30',
            'duration' => 8,
            'transit' => 5
        ]);
        DB::table('flight')->insert([
            'org_id' => 2,
            'from' => 2,
            'to' => 3,
            'flight_type' => 1,
            'departure'=>'2019-01-01 01:30' ,
            'return'=>'2019-01-02 08:30',
            'duration' => 2,
            'transit' => 4
        ]);
        DB::table('flight')->insert([
            'org_id' => 3,
            'from' => 1,
            'to' => 2,
            'flight_type' => 1,
            'departure'=>'2019-01-01 09:30',
            'return'=>'2019-01-02 01:30',
            'duration' => 44,
            'transit' => 11
        ]);

// // user
// 	id	name	email	phone	password	remember_token	created_at	updated_at
        DB::table('users')->insert([
            'name'=>'Khach hang 1',
            'email'=>'kh1@gmail.com',
            'phone'=>'kh1@gmail.com',
            'password'=>bcrypt('kh1@gmail.com'),
            'remember_token'=>'',
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name'=>'Khach hang 2',
            'email'=>'kh2@gmail.com',
            'phone'=>'kh2@gmail.com',
            'password'=>bcrypt('kh2@gmail.com'),
            'remember_token'=>'',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name'=>'Khach hang 3',
            'email'=>'kh3@gmail.com',
            'phone'=>'kh3@gmail.com',
            'password'=>bcrypt('kh3@gmail.com'),
            'remember_token'=>'',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),
        ]);


// // user
// 	id	name	email	phone	password	remember_token	created_at	updated_at
        

    }
}
