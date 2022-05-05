<?php

namespace Database\Seeders;

use App\Models\Roles as ModelsRoles;
use Illuminate\Database\Seeder;

class roles extends Seeder
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
                'level' => '1',
                'name' => "管理者",
            ],
            [
                'level' => '2',
                'name' => "老師",
            ],
           
        ];

        foreach ($data as $datum) {
            ModelsRoles::firstOrCreate($datum);
        }
    }
}
