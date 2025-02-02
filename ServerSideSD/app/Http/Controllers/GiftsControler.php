<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GiftsControler extends Controller
{

    public function showAllGifts(){

        $data = $this->getAllGifts();

        $users = $this->getAllUsers();


        return view('gifts.all_gifts', compact('data','users'));
    }

    public function showInfoGifts($id){

        $data = db::table('gifts')
        ->where('gifts.id',$id)
        ->join('users', 'users.id', '=', 'gifts.user_id')
        ->select('gifts.*','users.name as userName')
        ->get();

        return view('gifts.info_gifts', compact('data'));
    }

    public function deleteGifts($id){


        DB::table('gifts')
        ->where('id',$id)
        ->delete();


        // return view('gifts.all_gifts', compact('data','users'));
        return redirect()->route('gifts.all')->with('message','Prenda apagada com sucesso');
    }

    protected function getAllGifts(){

        $data = DB::table('gifts')
        ->join('users', 'users.id', '=', 'gifts.user_id')
        ->select('gifts.*','users.name as userName')
        ->get();
        return $data;
    }

    protected function getAllUsers(){
        $users = DB::table('users')
        ->select('id','name')
        ->get();
        return $users;
    }

    public function createGifts(Request $request){


        $request->validate([
            'name' => 'required|string|min:5|max:50',
            'price' => 'required|numeric|min:0.01',
            'costs' => 'required|numeric|min:0.01',
            'user_id' => 'required|exists:users,id'
        ]);



        DB::table('gifts')
        ->insert([
            'name'=> $request->name,
            'price' => $request->price,
            'costs' => $request->costs,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('gifts.all')->with('message','Prenda adicionada com sucesso');

    }

    public function updateGifts($id){

        $users = db::table('users')
        ->select('id','name')
        ->get();



        $inf = db::table('gifts')
        ->where('gifts.id',$id)
        ->join('users', 'users.id', '=', 'gifts.user_id')
        ->select('gifts.*','users.name as userName')
        ->first();

        return view('gifts.update_gifts', compact('inf','users'));
    }

    public function updateGiftInfo(Request $request){

        $request->validate([
            'name' => 'required|string|min:5|max:50',
            'price' => 'required|numeric|min:0.01',
            'costs' => 'required|numeric|min:0.01',
            'user_id' => 'required|exists:users,id'
        ]);

        DB::table('gifts')
        ->where('id',$request->id)
        ->update([
            'name'=> $request->name,
            'price' => $request->price,
            'costs' => $request->costs,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('gifts.all')->with('message','Prenda editada com sucesso');
    }

}
