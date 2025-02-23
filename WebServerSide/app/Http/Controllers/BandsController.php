<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Banda;

class BandsController extends Controller
{
    public function allbands(){

        $search = null;

        $search = request()->query('search')?  request()->query('search') : null;

        $BandInfo = $this->getAllBands($search);

        // dd($quant);

        return view('bands.show_all', compact('BandInfo'));
    }


    protected function getAllBands($search){


        $BandInfo = DB::table('bandas');

        if ($search){
            $BandInfo = $BandInfo
                ->where('name','like', "%{$search}%");
        }
        $BandInfo = $BandInfo
        ->select('id','name','quant_albuns','photo')
        ->get();

        return $BandInfo;

    }


    

    public function deletebands($id){

        DB::table('albuns')
        ->where('id_banda',$id)
        ->delete();

        DB::table('bandas')
        ->where('id',$id)
        ->delete();

        return back();

    }

    public function createbands(Request $request){



        if($request->id != ""){


            $request->validate([
                'name' => 'required|string|min:1|max:50',
                'quant_albuns' => 'required|numeric',
                'photo' => 'image'
            ]);

            $photo = null;

            if($request->hasFile('photo')){
                $photo = Storage::putFile('imgBands', $request->photo);
            }


            if ($photo != null){
                DB::table('bandas')
                ->where('id',$request->id)
                ->update([
                    'name' => $request->name,
                    'quant_albuns'=> $request->quant_albuns,
                    'photo' => $photo
                ]);
            }else {
                DB::table('bandas')
                ->where('id',$request->id)
                ->update([
                    'name' => $request->name,
                    'quant_albuns'=> $request->quant_albuns,
                ]);
            }








        }else{



            $request->validate([
                'name' => 'required|string|min:1|max:50',
                'quant_albuns' => 'required|numeric',
                'photo' => 'image'
            ]);



            $photo = null;

            if($request->hasFile('photo')){
                $photo = Storage::putFile('imgBands', $request->photo);
            }

            DB::table('bandas')
            ->insert([
                'name'=> $request->name,
                'quant_albuns' => $request->quant_albuns,
                'photo' => $photo
            ]);


        }

        return redirect()->route('bands.show_all')->with('message','Banda adicionada com sucesso');

    }

    public function getInfoForEdit($id){

        $search = null;

        $search = request()->query('search')?  request()->query('search') : null;

        $BandInfo = $this->getAllBands($search);

        $edit = $this->bandInfo($id);

        return view('bands.show_all', compact('BandInfo','edit'));

    }

    public function bandInfo($id){

        $edit = DB::table('bandas')
        ->where('id', $id)
        ->select('*')
        ->first();

        //dd($edit);

        return $edit;

    }
}
