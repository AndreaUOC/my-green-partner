<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plant;



class AppController extends Controller
{
    public function home()
    {
        return view('andrea-app.home');
    }

    public function about()
    {
        return view('andrea-app.about');
    }


}
