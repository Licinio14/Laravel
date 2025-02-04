<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TasksControler extends Controller
{
    public function allTasks(){

        $search = null;

        $search = request()->query('search')?  request()->query('search') : null;

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


        $search = null;

        $search = request()->query('search')?  request()->query('search') : null;

        $data = $this->newGetTasksAll($search);

        return view('tasks.showall_tasks',compact('data'));
    }

    protected function newGetTasksAll($search){

        $data = DB::table('tasks');

        if ($search){
            $data =  $data
                ->where('tasks.name','like', "%{$search}%");
        }


        $data = $data->join('users', 'tasks.user_id', '=', 'users.id' )
            ->select('tasks.*','users.name as userName')
            ->get();

        return $data;


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


        //continuar para diferenciar se é para inserir ou dar umdate (se tem id ou nao)

        if(isset($request->id)){
            

            $request->validate([
                'name' => 'required|string|min:5|max:50',
                'description' => 'required|min:10',
                'due' => 'required|date|after:tomorrow',
                'user_id' => 'required|exists:users,id'
            ]);

            DB::table('tasks')
            ->where('id',$request->id)
            ->update([
                'name' => $request->name,
                'description'=> $request->description,
                'due_at' => $request->due,
                'user_id' => $request->user_id
            ]);


        }else{


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
        }




        return redirect()->route('tasks.showAll')->with('message','User adicionado com sucesso');
    }

    public function UpdateView($id){

        $data = DB::table('tasks')
        ->where('tasks.id',$id)
        ->join('users', 'tasks.user_id', '=', 'users.id' )
        ->select('tasks.*','users.name as userName')
        ->first();

        $inf = DB::table('users')
        ->select('name','id')
        ->get();

        return view('tasks.update_tasks', compact('data','inf'));
    }
}
