<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
   public function show()
   {
      $user = User::with(['attendaces' => function ($query){
         $query->where('outTime','<>',null);
      }])->get();
      return view('usertable', [
         'users' => $user,
      ]);
   }
    public function createUser(Request $request)
    {
        User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'startTime' => $request->starttime,
            'endTime' => $request->endtime,
            'img' => $request->img,
        ]);

    }

    public function updateUser(Request $request)
    {
        User::query()->where('id',$request->id)->update([
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'img' => $request->img,
            'startTime' => $request->starttime,
            'endTime' => $request->endtime,
        ]);

    }
    public function deleteUser(Request $request)
    {
        User::find($request->id)->delete();
    }

    public function activeUser(Request $request)
    {
        User::onlyTrashed()->where('id', $request->id)->restore();
    }
}
