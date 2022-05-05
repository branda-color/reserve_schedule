<?php

namespace App\Service;

use App\Models\Reserve;

class TeacherReserveService
{
    public function ReserveTime(int $userid,int $studentid, int $year, int $month, int $week, int $day, string $starttime,string $endtime):Reserve
    {
    
        $ReserveId = Reserve::create([
            'user_id' => $userid,
            'student_id' => $studentid,
            'year' => $year,
            'month' => $month,
            'week' => $week,
            'day' => $day,
            'start_time' =>$starttime,
            'end_time' =>$endtime
        ]);

        return $ReserveId;
    }
}
