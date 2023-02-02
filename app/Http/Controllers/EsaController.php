<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EsaController extends Controller
{
    //
    public function top()
    {
        return view('top');
    }
    public function sign_up()
    {
        return view('sign_up');
    }
}
