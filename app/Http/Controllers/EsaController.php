<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class EsaController extends Controller
{
    public function top()
    {
        $students = Student::all();

        return view(
            'top',
            ['students' => $students]
        );
    }
    public function sign_up()
    {
        return view('sign_up');
    }
    public function search(Request $request)
    {
        $students = Student::where('tel', 'like', "%{$request->search}%")->get();

        return view(
            'top',
            ['students' => $students]
        );
    }
}
