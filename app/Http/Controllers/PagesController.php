<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceArea;

class PagesController extends Controller
{
     public function index(){

        $service_areas = ServiceArea::all();
        

         return view('pages.index')->with('service_areas',$service_areas);
     }

     public function index_tp(){

        $service_areas = ServiceArea::all();
        

         return view('pages.index_tp')->with('service_areas',$service_areas);
     }

     

     public function index_a(){

        $service_areas = ServiceArea::all();
        

         return view('pages.index_a')->with('service_areas',$service_areas);
     }


     
     public function index_c(){

        $service_areas = ServiceArea::all();
        

         return view('pages.index_c')->with('service_areas',$service_areas);
     }



     public function quotation(){
         $name = "Chathura";
        return view('pages.quotation')->with('name',$name);
    }
}
