<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\View\View;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB as FacadesDB;

use function Symfony\Component\String\s;

class AdminController extends Controller
{
    /**
     * Display a turn view('users_list');listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        return view('admin');
    }

    public  function login(Request $request)
    {
        $name = $request->input('name');
        $pass = $request->input('password');

        if (env('ADMIN_LOGIN') === $name && env('ADMIN_PASS') === $pass) {
            $employee = User::with('attendaces')->orderBy('id','desc')->get()->toArray();
            return view('users_info', compact('employee'));
        } else {
            return redirect()->back()->with('msg', 'Incorrect email or password.');
        }
    }

    public function users_list(Request $request)
    {
        $query = User::with('attendaces')->orderBy('id','desc');
        if ($request->data){
            $employee = User::with('attendaces')->where('firstname',$request->data)->orderBy('id','desc')->get()->toArray();
            return response()->json($employee);
        }else if($request->type && $request->type == 'canceled'){
            $employee = $query->get()->toArray();

            return response()->json($employee);
        }else{
            if ($request->type && $request->type == 'deleted') {
                $query->onlyTrashed();
            }
            $employee = $query->get()->toArray();
            return view('users_info', compact('employee'));
        }
    }

    public function attendances(Request $request){
        $employee = User::with(['attendaces' => function ($query) use ($request) {
            $query->whereMonth('enterTime','=',$request->sortingData?:date('m'))->whereYear('enterTime','=', date('Y'));
        }])->orderBy('id','desc')->get()->toArray();

       if($request->sortingData){
           return response()->json($employee);
       }else{
           return view('attendances', compact('employee'));
       }
    }

}
