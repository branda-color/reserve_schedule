<?php

namespace App\Service;

use App\Models\Reserve;

class TeacherReserveService
{
    public function ReserveTime(int $userid, int $studentid, int $year, int $month, int $week, int $day, string $starttime, string $endtime): Reserve
    {

        $ReserveId = Reserve::create([
            'user_id' => $userid,
            'student_id' => $studentid,
            'year' => $year,
            'month' => $month,
            'week' => $week,
            'day' => $day,
            'start_time' => $starttime,
            'end_time' => $endtime
        ]);

        return $ReserveId;
    }

    public function UpdateReserveTime(int $id, ?int $year, ?int $month, ?int $week, ?int $day, ?string $starttime, ?string $endtime): void
    {
        $ReserveTime = Reserve::find($id);

        $ReserveTime->year = $year ?? $ReserveTime->year;
        $ReserveTime->month = $month ?? $ReserveTime->month;
        $ReserveTime->week = $week ?? $ReserveTime->week;
        $ReserveTime->day = $day ?? $ReserveTime->day;
        $ReserveTime->start_time = $starttime ?? $ReserveTime->start_time;
        $ReserveTime->end_time = $endtime ?? $ReserveTime->end_time;

        $ReserveTime->save();
    }

    public function DeleteReserveTime(int $id):void
    {
        $event = Reserve::find($id);
        $event->delete();
    }
}
