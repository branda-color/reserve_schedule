<?php

declare(strict_types=1);

namespace App\Service;

use Carbon\Carbon;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Utils\Strings;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Collection;

class appService
{
    public function getApp(int $int,?string $string): ?array
    {
        $arr = ['int'=>$int,'string'=>$string];


        return $arr;
       
    }
}
