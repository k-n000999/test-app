<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Mentor;
use App\Models\User;
use App\Http\Requests\CreateRequest;
use App\Models\Time_slots;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Exception;
use App\Notifications\MentorReservationNotification;
use Illuminate\Support\Facades\Notification;

class EsaController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $users = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($users)) {
            $user = Auth::user();
            if ($user->role === 'student') {
                $request->session()->regenerate();
                return redirect()->route('student_top');
            } elseif ($user->role === 'mentor') {
                $request->session()->regenerate();
                return redirect()->route('mentor_top');
            }
        }

        return redirect()->back()->with('message', '失敗しました');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('showLogin')->with('message', 'ログアウトしました');
    }

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'role' => $request['role'],
            ]);

            if ($request['role'] === 'student') {
                $student = Student::create([
                    'name' => $request['name'],
                    'learning_language' => $request['learning_language'],
                    'experience_level' => $request['experience_level'],
                ]);
                $user->detail_id = $student->id;
            } elseif ($request['role'] === 'mentor') {
                $mentor = Mentor::create([
                    'name' => $request['name'],
                    'teaching_languages' => $request['teaching_languages'],
                    'experience_years' => $request['experience_years'],
                    'introduction' => $request['introduction'],
                ]);
                $user->detail_id = $mentor->id;
            }
            $user->save();
        });

        return redirect()->route('showLogin');
    }

    public function top()
    {
        $students = Student::all();
        $mentors = Mentor::all();
        $user = Auth::user();
        $students = Student::paginate(10);
        $mentors = Mentor::paginate(10);
        if ($user->role === 'student') {
            return view('student_top', ['mentors' => $mentors]);
        } elseif ($user->role === 'mentor') {
            return view('mentor_top', ['students' => $students]);
        }
    }

    public function search(Request $request)
    {
        $user = Auth::user();

        if ($user->role === 'student') {
            $mentors = Mentor::where('name', 'like', "%{$request->search}%")
                ->orWhere('teaching_languages', 'like', "%{$request->search}%")
                ->get();

            return view('student_top', ['mentors' => $mentors]);
        } elseif ($user->role === 'mentor') {
            $students = Student::where('name', 'like', "%{$request->search}%")
                ->orWhere('learning_language', 'like', "%{$request->search}%")
                ->get();

            return view('mentor_top', ['students' => $students]);
        }
    }

    public function mentor_time()
    {
        $mentor = Auth::user();
        return view('mentor_time', compact('mentor'));
    }

    public function timeslot(Request $request)
    {
        $mentor = Auth::user();

        if ($mentor) {
            $inputs = $request->validate([
                'start_time' => ['required', 'date'],
                'end_time' => ['required', 'date', 'after:start_time'],
            ]);

            $inputs['mentor_id'] = $mentor->id;
            $inputs['status'] = 'available';
            Time_slots::create($inputs);

            return redirect()->route('mentor_top');
        }

        return redirect()->back()->with('message', '予約はメンターのみ可能です');
    }

    public function showReserve($id)
    {
        $mentor = Mentor::find($id);
        $user = User::where('role', 'mentor')->where('detail_id', $id)->first();
        $reservationTimeSlots = Reservation::pluck('time_slot_id');
        $time_slots = Time_slots::where('mentor_id', $user->id)->whereNotIn('id', $reservationTimeSlots)->orderBy('start_time', 'asc')->get();

        return view('reserve', compact('mentor', 'time_slots'));
    }

    public function reserve(Request $request, $id)
    {
        $students = Auth::user();
        $time_slot = Time_slots::find($id);

        $time_slot->status = "available";
        $time_slot->save();

        $reservation = Reservation::create([
            'student_id' => $students->id,
            'time_slot_id' => $time_slot->id,
        ]);

        return redirect()->back()->with('message', '予約を申請中！');
    }

    public function showTimelist()
    {
        $user = Auth::user();
        $mentor = $user->id;
        $timeSlots = Time_slots::where('mentor_id', $mentor)->orderBy('start_time', 'asc')->paginate(5);;


        return view('Timelist', ['timeSlots' => $timeSlots]);
    }

    public function showReservationlist(Request $request, $id)
    {
        $user = Auth::user();
        $mentor = $user->id;
        $timeSlots = Time_slots::where('mentor_id', $mentor)->where('id', $id)->first();
        $status = $timeSlots->status;
        $reservation = Reservation::where('time_slot_id', $id)->first();

        $student = null;

        if ($reservation) {
            $studentUser = User::find($reservation->student_id);
            $student = Student::where('id', $studentUser->detail_id)->first();
        }

        return view('Reservationlist', ['status' => $status, 'timeSlots' => $timeSlots, 'reservation' => $reservation, 'student' => $student]);
    }

    public function approve($id)
    {
        $timeSlots = Time_slots::find($id);
        $status = $timeSlots->status;

        if ($timeSlots) {
            if ($status === 'available') {
                $timeSlots->status = 'booked';
            } elseif ($status === 'booked') {
                $timeSlots->status = 'available';
            }
            $timeSlots->save();
        }


        return redirect()->route('mentor_Reservationlist', ['id' => $timeSlots->id]);
    }

    public function delete($id)
    {
        $user = Auth::user();
        $timeSlots = Time_slots::find($id);
        $reservation = Reservation::where('time_slot_id', $timeSlots->id)->first();
        $reservation->delete();
        $timeSlots->status = "available";
        $timeSlots->save();

        if ($user->role === 'student') {
            return redirect()->route('student_Status', ['id' => $timeSlots->id])->with('message', 'キャンセルしました');
        } elseif ($user->role === 'mentor') {
            return redirect()->route('mentor_Reservationlist', ['id' => $timeSlots->id])->with('message', '削除しました');
        }
    }

    public function Status()
    {
        $user = Auth::user();
        $reservations = Reservation::where('student_id', $user->id)->get();

        $mentorTimeSlots = [];
        $status = [];

        foreach ($reservations as $reservation) {
            $timeSlot = Time_slots::find($reservation->time_slot_id);

            if ($timeSlot) {
                $mentor = User::find($timeSlot->mentor_id);

                $mentorTimeSlots[] = [
                    'timeSlot_id' => $timeSlot->id,
                    'mentor_name' => $mentor->name,
                    'start_time' => $timeSlot->start_time,
                    'end_time' => $timeSlot->end_time,
                    'status' => $timeSlot->status,
                ];
                $status[] = $timeSlot->status;
            }
        }

        usort($mentorTimeSlots, function ($a, $b) {
            return strtotime($a['start_time']) - strtotime($b['start_time']);
        });

        return view('student_reserve_status', ['mentorTimeSlots' => $mentorTimeSlots, 'status' => $status]);
    }
}
