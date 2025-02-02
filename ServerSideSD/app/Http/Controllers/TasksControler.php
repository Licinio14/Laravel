<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TasksControler extends Controller
{
    public function allTasks(){
        $tasks = $this->getAllTasks();
        $availableTasks = $this->getAvailableTasks();

        return view('tasks.all_tasks',compact('tasks','availableTasks'));
    }


    private function getAllTasks(){
        $tasks = [
            ['name' => 'Rita', 'task' => 'estudar laravel'],
            ['name' => 'Joao', 'task' => 'estudar Mysql']
        ];

        return $tasks;
    }

    private function getAvailableTasks(){
        $availableTasks=['sql', 'js', 'Java', 'POO'];
        return $availableTasks;
    }

    public function showAllTasks(){

        $data = DB::table('tasks')
            ->join('users', 'tasks.user_id', '=', 'users.id' )
            ->select('tasks.*','users.name as userName')
            ->get();


        return view('tasks.showall_tasks',compact('data'));
    }

    public function showOneTasks($id){
        $data = DB::table('tasks')
        ->where('tasks.id',$id)
        ->join('users', 'tasks.user_id', '=', 'users.id' )
        ->select('tasks.*','users.name as userName')
        ->first();


        return view('tasks.one_tasks', compact('data'));
    }

    public function deleteOneTasks($id){

        $data = DB::table('tasks')
        ->where('id',$id)
        ->delete();

        return back();
    }

    public function addTasks(){

        $inf = DB::table('users')
        ->select('name','id')
        ->get();

        return view('tasks.add_tasks', compact('inf'));
    }

    public function createTasks(Request $request){

        $request->validate([
            'name' => 'required|string|min:5|max:50',
            'description' => 'required|min:10',
            'due' => 'required|date|after:tomorrow',
            'user_id' => 'required|exists:users,id'
        ]);


        DB::table('tasks')
        ->insert([
            'name'=> $request->name,
            'description' => $request->description,
            'due_at' => $request->due,
            'user_id' => $request->user_id,
            'status' => 0,
            'created_at' => now()
        ]);

        return redirect()->route('tasks.showAll')->with('message','User adicionado com sucesso');
    }
}
