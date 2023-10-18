<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Mentor;
use App\Models\User;
use App\Models\TimeSlot;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{
    //
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
        $user = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

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

    public function delete($id)
    {
        $user = Auth::user();
        $timeSlot = TimeSlot::find($id);
        $reservation = Reservation::where('time_slot_id', $timeSlot->id)->first();
        $reservation->delete();
        $timeSlot->status = "available";
        $timeSlot->save();

        if ($user->role === 'student') {
            return redirect()->route('student_Status', ['id' => $timeSlot->id])->with('message', 'キャンセルしました');
        } elseif ($user->role === 'mentor') {
            return redirect()->route('mentor_Reservationlist', ['id' => $timeSlot->id])->with('message', '削除しました');
        }
    }
}
