<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BandsController extends Controller
{
    public function allbands(){

        $search = null;

        $search = request()->query('search')?  request()->query('search') : null;

        $BandInfo = $this->getAllBands($search);

        return view('bands.show_all', compact('BandInfo'));
    }


    protected function getAllBands($search){


        $BandInfo = DB::table('bandas');

        if ($search){
            $BandInfo = $BandInfo
                ->where('name','like', "%{$search}%");
        }

        $BandInfo = $BandInfo->select('id','name','quant_albuns','photo')
        ->get();

        return $BandInfo;
    }

    public function onebands($id){

        $search = null;

        $search = request()->query('search')?  request()->query('search') : null;

        $BandInfo = $this->getOneBands($search,$id);

        return view('bands.show_one', compact('BandInfo'));
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

    public function deletebands($id){

        DB::table('albuns')
        ->where('id_banda',$id)
        ->delete();

        DB::table('bandas')
        ->where('id',$id)
        ->delete();

        return back();

    }
}
