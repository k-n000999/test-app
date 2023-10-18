<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeSlot;
use Illuminate\Support\Facades\Auth;

class MentorTimeRegisterController extends Controller
{
    //
    public function mentor_time()
    {
        $mentor = Auth::user();
        return view('mentor_time', compact('mentor'));
    }

    public function timeSlot(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            $inputs = $request->validate([
                'start_time' => ['required', 'date'],
                'end_time' => ['required', 'date', 'after:start_time'],
            ]);

            $inputs['mentor_id'] = $user->detail_id;
            $inputs['status'] = 'available';
            TimeSlot::create($inputs);
        }

        return redirect()->back()->with('message', '予約可能時間の登録が完了しました');
    }
}
