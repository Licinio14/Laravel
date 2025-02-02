<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FallBackControler extends Controller
{
    public function notFound(){
        return view('fallback');
    }
}
