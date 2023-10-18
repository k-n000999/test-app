<?php

namespace App\Http\Controllers;

use App\Models\TimeSlot;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class StudentReservationStatusController extends Controller
{
    //
    public function status()
    {

        $reservations = Reservation::with(['timeSlot' => function ($query) {
            $query->orderBy('start_time', 'asc');
        }])
            ->where('student_id', Auth::user()->detail_id)
            ->get();
        $status = $reservations->pluck('timeSlot.status');


        return view('student_reserve_status', ['reservations' => $reservations, 'status' => $status]);
    }

    public function delete($id)
    {
        $timeSlot = TimeSlot::with('reservation')->find($id);
        $timeSlot->reservation->delete();
        $timeSlot->status = "available";
        $timeSlot->save();

        return redirect()->route('student_Status', ['id' => $timeSlot->id])->with('message', 'キャンセルしました');
    }
}
