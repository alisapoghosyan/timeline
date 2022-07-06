<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AttendanceController extends Controller
{
	public function doAction(Request $request, User $user)
	{
		$message = '';
		if ($request->code == $user->code) {
			if ($user->isActive) {
				$user->attendaces()->update(['outTime'=> Carbon::now()]);
				$message = 'You logged out';
			} else {
				$user->attendaces()->create(['enterTime' =>  Carbon::now()]);
				$message = 'You are entered';

			}
			$user->isActive = !$user->isActive;
			$user->save();
			
		
		} else {
			$message = 'Wrong code';
		}

		return redirect('/users')->withErrors($message);
	}
}
