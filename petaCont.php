<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; 

class petaCont extends Controller
{
    //   public function __construct()
    // {
    //     $this->middleware('auth');
    // }
      public function viewWisata()
      {
        
        $wisata = DB::table('wisata')->where('wisata_id','=',$wisata_id)->first();

            return view('peta')
            ->with('wisata',$wisata);
       
    }


    

     

}
