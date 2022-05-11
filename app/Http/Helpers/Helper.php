<?php


if (!function_exists('att')) {

    function att()
    {
        return 222222;
    }
}

if (!function_exists('GetWeek')) {

    function GetWeekDays($startday,$endday,$num)
    {
        //這個函數必須是傳timestamp
        $first_day = date('Y/m/d',$startday);
        //這個函數必須是傳timestamp
        $end_day = date('Y/m/d',$endday);
        //傳要禮拜幾,星期一是0
        $num = $num;

        $WeekDays = array();

        //9月起始週別到目前週別
        while (date('Y/m/d',strtotime($first_day)) <= date('Y/m/d',strtotime($end_day))){
          
          $week_date = new \DateTime();
          $week_date->setISODate(date('Y',strtotime($first_day)),date('W',strtotime($first_day)));
          $week_first_date = $week_date->format('Y/m/d');
          
          //取週數
          $week =date('W',strtotime($week_first_date)); 

          $day = date('Y/m/d',strtotime($week_first_date."+"."$num"." day"));
          
        //取若比endday小就放入陣列,否則會有超出endday的情形
          if($day < $end_day ){

            $WeekDays["$week"] = $day;

          } 
    
          //遞增週數   
          $first_day = date("Y/m/d",strtotime($first_day.'+7 day'));
        }

        return $WeekDays;

    }
}
