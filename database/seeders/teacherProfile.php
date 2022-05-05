<?php

namespace Database\Seeders;

use App\Models\TeacherProfile as ModelsTeacherProfile;
use Illuminate\Database\Seeder;

class teacherProfile extends Seeder
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
                'user_id'=>2,
                'citizenship'=>"Taiwan",
                'sex'=>'F',
                'intro'=>"hello",
                'skill'=>"english"
            ],
            [
                'user_id'=>3,
                'citizenship'=>"Taiwan",
                'sex'=>'F',
                'intro'=>"hello123",
                'skill'=>"janpan"
            ],

     
        ];
        foreach ($data as $datum) {
            ModelsTeacherProfile::firstOrCreate($datum);
        }
    }
}
