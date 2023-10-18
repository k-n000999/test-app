<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Mentor;
use Illuminate\Support\Facades\Auth;

class TopController extends Controller
{
    //
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
                ->paginate(10);
            return view('student_top', ['mentors' => $mentors]);
        } elseif ($user->role === 'mentor') {
            $students = Student::where('name', 'like', "%{$request->search}%")
                ->orWhere('learning_language', 'like', "%{$request->search}%")
                ->paginate(10);

            return view('mentor_top', ['students' => $students]);
        }
    }
}
