<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TimeSlot;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class StudentReserveController extends Controller
{
    //
    public function showReserve($MentorId)
    {
        $user = User::where('role', 'mentor')->where('detail_id', $MentorId)->first();
        $time_slots = $user->mentor->timeSlots()->whereNotIn('id', Reservation::pluck('time_slot_id'))->orderBy('start_time', 'asc')->get();

        return view('reserve', compact('user', 'time_slots'));
    }

    public function reserve($TimeSlotsId)
    {
        $time_slot = TimeSlot::find($TimeSlotsId);

        $time_slot->status = "available";
        $time_slot->save();

        $time_slot->reservation()->create(['student_id' => Auth::user()->detail_id]);

        return redirect()->back()->with('message', '予約を申請中！');
    }
}
