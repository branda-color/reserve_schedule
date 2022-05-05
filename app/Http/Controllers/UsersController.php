<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class UsersController extends Controller
{
    public function getUser()
    {
    }
    public function getUserId(Request $request)
    {

        $payload = \JWTAuth::parseToken()->getPayload();

        $id = $payload->get('sub');

        $user = User::find($id);

        return $user;
    }
    public function postUser()
    {

        // DB::enableQueryLog();
        $user =  User::create([
            'email' => 'test6@gmail.com',
            'name' =>"yuyu",
            'password' => bcrypt(12345678),
            'role_id' => 2,
        ]);

        // dd(DB::getQueryLog());

        return ['id' => $user->id];
    }
    public function putUser($id)
    {

        return $id;

    }
    public function putPasUser(Request $request, int $id)
    {
        
        User::where('id', $id)->update([
            'password' => bcrypt($request->input('password')),
        ]);
        return 'update'.$id;
    }
    public function delUser(Request $request, $int)
    {

        var_dump($int);

        // $user = User::find($id);
        // $user->delete();

        return 'OK';
    }
}
