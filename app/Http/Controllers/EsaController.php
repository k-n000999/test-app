<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Mentor;
use App\Models\User;
use App\Http\Requests\CreateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Exception;

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
        $user = Auth::user();


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

            $request->session()->regenerate();
            return redirect()->route('top')->with('message', 'ログインしました');
        }

        return redirect()->back()->with('message', '失敗しました');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('top')->with('message', 'ログアウトしました');
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

        return redirect()->route('top');
    }
}
