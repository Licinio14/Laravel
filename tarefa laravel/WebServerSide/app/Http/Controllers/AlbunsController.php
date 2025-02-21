<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AlbunsController extends Controller
{
    public function createalbuns(Request $request){

        if($request->id != ""){


            $request->validate([
                'name' => 'required|string|min:1|max:50',
                'photo' => 'image',
                'date' => 'date',
                'id_banda' => 'required|exists:bandas,id'
            ]);

            $photo = null;

            if($request->hasFile('photo')){
                $photo = Storage::putFile('imgBands', $request->photo);
            }


            if ($photo != null){
                DB::table('albuns')
                ->where('id',$request->id)
                ->update([
                    'name' => $request->name,
                    'photo' => $photo,
                    'date' => $request->date,
                    'id_banda' => $request->id_banda
                ]);
            }else {
                DB::table('albuns')
                ->where('id',$request->id)
                ->update([
                    'name' => $request->name,
                    'date' => $request->date,
                    'id_banda' => $request->id_banda
                ]);
            }

        }else{

            $request->validate([
                'name' => 'required|string|min:1|max:50',
                'photo' => 'image',
                'date' => 'date',
                'id_banda' => 'required|exists:bandas,id'
            ]);



            $photo = null;

            if($request->hasFile('photo')){
                $photo = Storage::putFile('imgBands', $request->photo);
            }

            DB::table('albuns')
            ->insert([
                'name' => $request->name,
                    'photo' => $photo,
                    'date' => $request->date,
                    'id_banda' => $request->id_banda
            ]);


        }


        return redirect()->route('bands.show_all')->with('message','Album adicionado com sucesso');

    }

    public function deletealbuns($id){


        DB::table('albuns')
        ->where('id',$id)
        ->delete();

        return back();
    }

    public function getInfoForEdit($id){

        $edit = DB::table('albuns')
        ->where('id', $id)
        ->select('*')
        ->first();


        return back()->compact('edit');

    }
}
