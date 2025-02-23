<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserControler extends Controller
{

    public function editUser($id){
        $search = null;

        $search = request()->query('search')?  request()->query('search') : null;

        $Users = $this->getAllUsers($search);

        $edit = $this->userInfo($id);

        return view('dashboard.show', compact('Users','edit'));
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

    public function userInfo($id){

        $edit = DB::table('users')
        ->where('id', $id)
        ->select('id','name', 'photo','email','user_type')
        ->first();

        //dd($edit);

        return $edit;

    }


    public function addUser(){
        return view('auth.register');
    }

    public function deleteUser($id){
        DB::table('users')
        ->where('id',$id)
        ->delete();

        return back()->with('message','Utilizador apagado com sucesso');
    }

    public function createUser(Request $request){

        if($request->id != ""){




            $request->validate([
                'name' => 'required|string|min:3',
                'user_type' => 'in:0,1',
                'photo' => 'image'
            ]);

            $photo = null;

            if($request->hasFile('photo')){
                $photo = Storage::putFile('imgBands', $request->photo);
            }



            if ($photo != null){
                DB::table('users')
                ->where('id',$request->id)
                ->update([
                    'name' => $request->name,
                    'updated_at' => now(),
                    'user_type' => $request->user_type,
                    'photo' => $photo
                ]);
            }else {
                DB::table('users')
                ->where('id',$request->id)
                ->update([
                    'name' => $request->name,
                    'updated_at' => now(),
                    'user_type' => $request->user_type,
                ]);
            }

            return redirect()->route('dashboard.show')->with('message','Conta editada com sucesso');

        }else{

            $request->validate([
                'name' => 'required|string|min:3',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
                'photo' => 'image'
            ]);

            $photo = null;

            if($request->hasFile('photo')){
                $photo = Storage::putFile('imgBands', $request->photo);
            }



            if ($photo != null){
                DB::table('users')
                ->insert([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'created_at' => now(),
                    'photo' => $photo
                ]);
            }else {
                DB::table('users')
                ->insert([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'created_at' => now()
                ]);
            }

            return redirect()->route('home')->with('message','Conta criada com sucesso');


        }



    }
}
