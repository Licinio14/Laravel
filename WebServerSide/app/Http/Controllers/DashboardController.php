<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function showDashboard(){

        $search = null;

        $search = request()->query('search')?  request()->query('search') : null;

        $Users = $this->getAllUsers($search);

        return view('dashboard.show', compact('Users'));
    }

    public function getAllUsers($search){

        $Users = DB::table('users');

        if ($search){
            $Users = $Users
                ->where('name','like', "%{$search}%")
                ->select('id','name','email','photo','user_type')
                ->get();
        }else{
            $Users = $Users
            ->select('id','name','email','photo','user_type')
            ->paginate(10);
        }

        return $Users;

    }
}
