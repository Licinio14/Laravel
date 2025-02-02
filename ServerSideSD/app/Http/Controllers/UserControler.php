<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserControler extends Controller
{
    public function allUser(){
        $cesaeInfo = $this->getCesaeInfo();
        $userInfo = $this->getAllUsers();

        $contactPerson = DB::table('users')->where('name', 'Licinio')->first();

        $this->updadetUserAtDB();

        // $this->deletUserAtDB(3);

        return view('users.all_users', compact('cesaeInfo', 'userInfo','contactPerson'));
    }

    public function nameUser($name){
        return '<h1>Hello </h1>'.$name;
    }

    public function addUser(){
        return view('users.add_users');
    }

    private function getCesaeInfo(){
        $userInfo = [
            'name' => 'Cesae',
            'address' => 'R. de Ciríaco Cardoso 186, 4150-212 Porto',
            'email' => 'cesae@cesae.com'
        ];
        return $userInfo;
    }

    protected function getAllUsers(){

        $userInfo = DB::table('users')
        ->select('name','email','password','id')
        ->get();

        return $userInfo;
    }

    public function insertUser(){
        DB::table('users')
        ->insert([
            'name'=> 'Licinio3',
            'email' => 'l3@gmail.com',
            'address' => 'dwadwefeafraf',
            'password' => '1234'
        ]);

        // caso usasse a rota para chamar a função, retornaria algo para informar o utilizador
        // return response()->json('utilizador inserido');
    }

    public function updadetUserAtDB(){
        DB::table('users')
        ->where('id',1)
        ->update([
            'email_verified_at'=> now(),
            'address' => 'Rua nova atualizada',
            'updated_at' => now()
        ]);
    }

    public function deletUserAtDB($id){

        DB::table('tasks')
        ->where('user_id',$id)
        ->delete();

        DB::table('gifts')
        ->where('user_id',$id)
        ->delete();

        DB::table('users')
        ->where('id',$id)
        ->delete();




        return back();

    }

    public function showOneUser($id){

        $userInfo = DB::table('users')
        ->where('id',$id)
        ->select('name','email','id','address','nif')
        ->first();

        return view('users.one_users', compact('userInfo'));
    }

    public function createUser(Request $request){

        $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users',
            'pd' => 'required|min:8',
            'address' => 'required|min:5',
            'cbox' => 'required'
        ]);

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->pd),
            'address' => $request->address,
        ]);

        return redirect()->route('users.show')->with('message','User adicionado com sucesso');

    }

    public function updateUser($id){

        $inf = DB::table('users')
        ->where('id',$id)
        ->first();

        return view('users.update_users', compact('inf'));
    }

    public function updateUserInfo(Request $request){

        // $id_validation = DB::table('users')
        // ->where('id',$request->id)
        // ->first();

        // if (!$id_validation){
        //     dd('nao existe');
        //     $request->id;
        // }

        $request->validate([
            'id' => 'required|exists:users,id',
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users',
            'address' => 'required|min:5',
        ]);


        DB::table('users')
        ->where('id',$request->id)
        ->update([
            'updated_at' => now(),
            'name'=> $request->name,
            'email' => $request->email,
            'address' => $request->address
        ]);



        return redirect()->route('users.show')->with('message','User modificado com sucesso');

    }


}
