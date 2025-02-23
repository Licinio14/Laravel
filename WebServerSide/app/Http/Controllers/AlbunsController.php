<?php

namespace App\Http\Controllers;

use App\Models\Albun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AlbunsController extends Controller
{
    public function index(){



        $search = null;

        $search = request()->query('search')?  request()->query('search') : null;

        $BandInfo = $this->getAllAlbuns($search);

        $bandas = $this->getBandas();

        return view('albuns.show_all', compact('BandInfo','bandas'));
    }


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

    public function onebands($id){

        $search = null;

        $search = request()->query('search')?  request()->query('search') : null;

        $BandInfo = $this->getOneBands($search,$id);

        $bandas = $this->getBandas();

        return view('albuns.show_one', compact('BandInfo','bandas'));
    }

    protected function getBandas(){
        $bandas = DB::table('bandas')
        ->select('name','id')
        ->get();

        return $bandas;
    }


    protected function getOneBands($search,$id){


        $BandInfo = DB::table('albuns')
        ->where('id_banda', $id);

        if ($search){
            $BandInfo = $BandInfo
                ->where('name','like', "%{$search}%");
        }

        $BandInfo = $BandInfo->select('id','name','id_banda','photo','date')
        ->get();

        return $BandInfo;
    }

    protected function getAllAlbuns($search){


        $BandInfo = DB::table('albuns');

        if ($search){
            $BandInfo = $BandInfo
                ->where('name','like', "%{$search}%");
        }

        $BandInfo = $BandInfo->select('id','name','id_banda','photo','date')
        ->paginate(50);

        return $BandInfo;
    }
}
