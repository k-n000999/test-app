<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Mentor;

class TopController extends Controller
{
    //
    public function studentTop(Request $request)
    {
        $search = $request->input('search');

        $mentors = Mentor::with('user.tags')
            ->where('name', 'like', "%{$search}%")
            ->orWhere('teaching_languages', 'like', "%{$search}%")
            ->orWhereHas('user.tags', function ($subq) use ($search) {
                $subq->where('name', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('student_top', ['mentors' => $mentors]);
    }

    public function mentorTop(Request $request)
    {
        $search = $request->input('search');

        $students = Student::with('user.tags')
            ->where('name', 'like', "%{$search}%")
            ->orWhere('learning_language', 'like', "%{$search}%")
            ->orWhereHas('user.tags', function ($subq) use ($search) {
                $subq->where('name', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('mentor_top', ['students' => $students]);
    }
}
