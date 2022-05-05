<?php

namespace App\Http\Controllers\Database;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class MigrateController extends Controller
{
    public function __invoke(Request $request)
    {
        Artisan::call('migrate', [
            //加上--force強制忽略系統詢問直接執行
            '--force' => true
        ]);

        return Artisan::output();
    }
}
