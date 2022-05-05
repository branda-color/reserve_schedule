<?php

namespace App\Http\Controllers\Database;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SeedController extends Controller
{
    public function __invoke(Request $request)
    {
        //database\seeders在這個資料夾新建要新增的資料
        Artisan::call('db:seed', [
            '--force' => true
        ]);

        return Artisan::output();
    }
}
