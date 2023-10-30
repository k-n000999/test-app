<?php

namespace App\Http\Controllers;

use App\Models\TimeSlot;
use Illuminate\Support\Facades\Auth;

class ReservationInfoController extends Controller
{
    //
    public function showTimeList()
    {
        $timeSlots = Auth::user()->mentor->timeSlots()->orderBy('start_time', 'asc')->paginate(5);

        return view('Time_List', ['timeSlots' => $timeSlots]);
    }

    public function showReservationlist($TimeSlotId)
    {
        $timeSlot = TimeSlot::with(['reservation.student'])->find($TimeSlotId);

        return view('mentor_reservation_list', ['timeSlot' => $timeSlot]);
    }

    public function approve($id)
    {
        $timeSlots = TimeSlot::find($id);

        if ($timeSlots) {
            if ($timeSlots->status === 'available') {
                $timeSlots->status = 'booked';
            } elseif ($timeSlots->status === 'booked') {
                $timeSlots->status = 'available';
            }
            $timeSlots->save();
        }

        return redirect()->route('mentor_reservation_list', ['id' => $timeSlots->id]);
    }

    public function delete($id)
    {
        $timeSlot = TimeSlot::with('reservation')->find($id);
        $timeSlot->reservation->delete();
        $timeSlot->status = "available";
        $timeSlot->save();

        return redirect()->route('mentor_reservation_list', ['id' => $timeSlot->id])->with('message', '削除しました');
    }
}
