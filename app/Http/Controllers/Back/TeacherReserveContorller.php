<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Reserve;
use App\Service\TeacherReserveService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TeacherReserveContorller extends Controller
{

    protected $service;

    public function __construct(TeacherReserveService $service)
    {
        $this->service = $service;
    }

    public  function CreateTReserve(Request $request)
    {
        $params = [
            'user_id' => $request->user_id,
            'student_id' => $request->student_id,
            'year' => $request->year,
            'month' => $request->month,
            'week' => $request->week,
            'day' => $request->day,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time
        ];
        $validator = Validator::make(
            $params,
            [
                'user_id' => 'required|exists:users,id',
                'student_id' => 'required|exists:students,id',
                'year' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 1),
                'month' => 'required|numeric|between:1,12',
                'week' => 'required|numeric|between:1,52',
                'day' => 'required|numeric|between:1,31',
                'start_time' => 'required|date',
                'end_time' => 'required|date'
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }
        $ReserveId = $this->service->ReserveTime(
            $params['user_id'],
            $params['student_id'],
            $params['year'],
            $params['month'],
            $params['week'],
            $params['day'],
            $params['start_time'],
            $params['end_time']
        );
        return $ReserveId;
    }

    public function UpdateTReserve(Request $request, int $id)
    {
        $params = $request->all();
        $params['id'] = $id;
        //只能更新時間不得換學生或老師
        $usersWhereHasEditorRole = Reserve::where('id', $id)->pluck('user_id');
        $studentWhereHasEditorRole = Reserve::where('id', $id)->pluck('student_id');
        $validator = Validator::make(
            $params,
            [
                'id' => 'required|exists:reserve,id',
                'user_id' => [
                    'required',
                    Rule::in($usersWhereHasEditorRole)
                ],
                'student_id' => [
                    'required',
                    Rule::in($studentWhereHasEditorRole)
                ],
                'year' => 'required_without_all:month,week,day,start_time,end_time|digits:4|integer|min:1900|max:' . (date('Y') + 1),
                'month' => 'required_without_all:year,week,day,start_time,end_time|numeric|between:1,12',
                'week' => 'required_without_all:year,month,day,start_time,end_time|numeric|between:1,52',
                'day' => 'required_without_all:year,week,month,start_time,end_time|numeric|between:1,31',
                'start_time' => 'required_without_all:year,week,month,day,end_time|date',
                'end_time' => 'required_without_all:year,week,month,start_time,day|date'
            ]
        );


        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        $this->service->UpdateReserveTime(
            $id,
            $params['year'],
            $params['month'],
            $params['week'],
            $params['day'],
            $params['start_time'],
            $params['end_time']
        );
    }

    public function DeleteTReserve(Request $request, int $id)
    {
        $validator = Validator::make(
            [
                'id' => $id,
            ],
            [
                'id' => 'required|exists:reserve,id',
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        $this->service->DeleteReserveTime($id);
    }
}
