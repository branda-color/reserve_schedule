<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Service\appService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;
use Illuminate\Validation\Rule;
use App\Exceptions\Errexception;


class frontController extends Controller
{

    protected $service;

    public function __construct(appService $service)
    {
        $this->service = $service;
    }

    public function data(Request $request)
    {

        // \DB::enableQueryLog(); // Enable query log

        // // Your Eloquent query executed by using get()
        
        // dd(\DB::getQueryLog()); // Show results of log




        // try {                 
        // throw  new Errexception(['msg'=>'王召波自定義錯誤','code'=>205]);
        // } catch (Errexception $e) {  
        //     return $e;
        // }  

        // 繼續執行  
        // echo 'Hello World'; 






        $week =  GetWeekDays($request->date,$request->end,$request->num);


        print_r($week);


    }
}
