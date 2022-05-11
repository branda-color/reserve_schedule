<?php

namespace App\Service;

use App\Models\OpenTime;


class OpenTimeService
{
    public function GetTime(int $userid, int $year, string $view,?int $month, ?int $week, ?int $day)
    {
        switch ($view){

            case 'year':

        }
        
    }

    public function InsertTime(int $userid, int $year, int $month, int $week, int $day, array $time): OpenTime
    {

        $InsertId = OpenTime::create([
            'user_id' => $userid,
            'year' => $year,
            'month' => $month,
            'week' => $week,
            'day' => $day,
            'time' => json_encode($time)
        ]);

        return $InsertId;
    }

    public function UpdateTime(int $id, ?int $year, ?int $month, ?int $week, ?int $day, ?array $time): void
    {
        $openTime = OpenTime::find($id);

        $openTime->year = $year ?? $openTime->year;
        $openTime->month = $month ?? $openTime->month;
        $openTime->week = $week ?? $openTime->week;
        $openTime->day = $day ?? $openTime->day;
        $openTime->time = $time ?? $openTime->time;

        $openTime->save();
    }

    public function DeleteTime(int $id): void
    {
        $event = OpenTime::find($id);
        $event->delete();
    }
}
