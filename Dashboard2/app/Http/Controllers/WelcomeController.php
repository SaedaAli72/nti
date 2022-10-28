<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function print()
    {
       return view('print-message');
    }

    public function printMyName()
    {
        $name = "galal";
        return view('print-name',['name'=>$name]);
    }
}
