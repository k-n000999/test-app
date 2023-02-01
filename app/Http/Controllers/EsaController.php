<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EsaController extends Controller
{
    //
    public function top()
    {
        return view('Esa.top');
    }
    public function sign_up()
    {
        return view('Esa.sign_up');
    }
}
