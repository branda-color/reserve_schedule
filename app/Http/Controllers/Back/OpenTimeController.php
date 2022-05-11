<?php

namespace App\Http\Controllers\Back;

use App\Service\OpenTimeService;
use App\Http\Controllers\Controller;
use App\Models\OpenTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class OpenTimeController extends Controller
{
    protected $service;

    public function __construct(OpenTimeService $service)
    {
        $this->service = $service;
    }

    public function GetOpenTime(Request $request,int $id)
    {
        $params = $request->all();
        $params['user_id'] = $id;
        $validator = Validator::make(
            $params,
            [
                'user_id' => 'required|exists:users,id',
                'year' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 1),
                //選擇不同視角
                'view'=>'required|in:month,week,day',
                'month'=>'required_if:view,month,day|numeric|between:1,12',
                'week'=>'required_if:view,week|numeric|between:1,52',
                'day'=>'required_if:view,day|numeric|between:1,31'            
                   
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        $OpenTime = $this->service->GetTime(
            $params['user_id'],
            $params['year'],
            $params['view'],
            $params['month'],
            $params['week'],
            $params['day']
        );

        return $OpenTime;

    }

    public function CreateOpenTime(Request $request)
    {

        $IdArrp = array();

        $items = json_decode($request->getContent());


        foreach ($items as $item) {

            $params = [
                'user_id' => $item->user_id,
                'year' => $item->year,
                'month' => $item->month,
                'week' => $item->week,
                'day' => $item->day,
                'time' => $item->time
            ];
            $validator = Validator::make(
                $params,
                [
                    'user_id' => 'required|exists:users,id',
                    'year' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 1),
                    'month' => 'required|numeric|between:1,12',
                    'week' => 'required|numeric|between:1,52',//用一年週數來看
                    'day' => 'required|numeric|between:1,31',
                    'time' => 'required|array'
                ]
            );

            if ($validator->fails()) {
                return response()->json($validator->messages(), 400);
            }
            $InsertId = $this->service->InsertTime(
                $params['user_id'],
                $params['year'],
                $params['month'],
                $params['week'],
                $params['day'],
                $params['time'],
            );

            $IdArrp[] = $InsertId;
        }


        return  $IdArrp;
    }


    public function UpdateOpenTime(Request $request, int $id)
    {
        $params = $request->all();
        $params['id'] = $id;
        //定義只有相同userid才能改這筆資料
        $usersWhereHasEditorRole = OpenTime::where('id', $id)->pluck('user_id');
        $validator = Validator::make(
            $params,
            [
                'id' => 'required|exists:opentime,id',
                'user_id' => [
                    'required',
                    Rule::in($usersWhereHasEditorRole)
                ],
                'year' => 'required_without_all:month,week,day,time|digits:4|integer|min:1900|max:' . (date('Y') + 1),
                'month' => 'required_without_all:year,week,day,time|numeric|between:1,12',
                'week' => 'required_without_all:year,month,day,time|numeric|between:1,52',
                'day' => 'required_without_all:year,week,month,time|numeric|between:1,31',
                'time' => 'required_without_all:year,week,month,day|array'
            ]
        );


        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        $this->service->UpdateTime(
            $id,
            $params['year'],
            $params['month'],
            $params['week'],
            $params['day'],
            $params['time'],
        );
    }

    public function DeleteOpentime(Request $request, int $id)
    {
        $validator = Validator::make(
            [
                'id' => $id,
            ],
            [
                'id' => 'required|exists:opentime,id',
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        $this->service->DeleteTime($id);
    }
}
