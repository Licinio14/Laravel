<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeControler extends Controller
{
    public function index(){
        $myvar = 'Bem-vindo ao MySite';

        $contactInfo = $this->getContactInfo();

        // debug
        // dd($contactInfo); // -->dupm & die
        // var_dump($contactInfo); // --> nao da kill ao resto

        return view('home', compact('myvar', 'contactInfo'));
    }



    private function getContactInfo(){
        $contactInfo = [
            'name' => 'Sara Monteiro',
            'email' => 'sara@gmail.com'
        ];
        return $contactInfo;
    }
}
