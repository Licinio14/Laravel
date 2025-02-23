<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class ChatControler extends Controller
{
    public function index(){

        $chats = Chat::with('user')->paginate(10);

        return view('chat.show', compact('chats'));
    }

    public function deleteChat($id){

        Chat::find($id)->delete();

        return redirect()->back()->with('success', 'Mensagem apagada com sucesso!');

    }

    public function createChat(Request $request){

        $request->validate([
            'title' => 'required|string|min:1|max:50',
            'coment' => 'required|string|min:1|max:1000',
            'id_user' => 'required|exists:users,id'
        ]);

        Chat::create([
            'title' => $request->title,
            'coment' => $request->coment,
            'date' => now(),
            'id_user' => $request->id_user
        ]);

        return back()->with('message','Comentario adicionado!');

    }
}
