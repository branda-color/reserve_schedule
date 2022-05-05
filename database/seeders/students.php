<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class students extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'=>'yuyu',
                'username'=>'master',
                'mob'=>"+886932066206",
                'email'=>"wishcolor0@gmail.com",
                'password'=> Hash::make('12345678'),
                'class_No'=> 1,
                'timezone'=>"Asia/Tapiei",
                'status'=>'Y'
            ],
            [
                'name'=>'test1',
                'username'=>'teacher1',
                'mob'=>"+886932222222",
                'email'=>"test1@gmail.com",
                'password'=> Hash::make('12345678'),
                'class_No'=> 1,
                'timezone'=>"Asia/Tapiei",
                'status'=>'Y'
            ],
            [
                'name'=>'test2',
                'username'=>'teacher2',
                'mob'=>"+886932222222",
                'email'=>"test2@gmail.com",
                'password'=> Hash::make('12345678'),
                'class_No'=> 1,
                'timezone'=>"Asia/Tapiei",
                'status'=>'Y'
            ],
     
        ];
        foreach ($data as $datum) {
            Student::firstOrCreate($datum);
        }
    }
}
