<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Requests\CreateRequest;

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

    public function search(Request $request)
    {
        $students = Student::where('tel', 'like', "%{$request->search}%")->get();

        return view(
            'top',
            ['students' => $students]
        );
    }

    public function sign_up()
    {

        return view('sign_up');
    }

    public function create(CreateRequest $request)
    {

        $inputs = $request->all();
        Student::create($inputs);
        return redirect()->route('top');
    }

    public function edit($id)
    {
        $students = Student::find($id);
        return view('sign_up', ['students' => $students]);
    }

    public function update(CreateRequest $request)
    {

        $students = Student::find($request->id);

        $students->name = $request->name;
        $students->age = $request->age;
        $students->birthday = $request->birthday;
        $students->email = $request->email;
        $students->tel = $request->tel;
        $students->plan = $request->plan;
        $students->save();


        return redirect()->route('top');
    }

    public function delete($id)
    {
        $students = Student::find($id);
        $students->delete();

        return redirect()->route('top')->with('message', '削除しました');
    }
}
