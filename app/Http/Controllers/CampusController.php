<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\buildingcategory;

use App\Building;

class CampusController extends Controller
{
    public function index()
    {
       
        return view('campus.index', [
            'building'=>$building,
        ]);
    }
    public function guide(){
         $building = Building::all();
        return view('campus.guide.guide',[
            'building'=>$building,
        ]);
    }
    public function newData(){
        $category = buildingcategory::all();
        return view('campus.guide.newData',[
            'category'=>$category,
        ]);
    }
    public function createData(Request $request){
        $building = new Building;
        $building->building_id = $request->building_id;
        $building->buildingName = $request->buildingName;
        $building->buildingExplain = $request->buildingExplain;
        $building->imgUrl = $request->imgUrl;
        $building->save();
        return redirect('/campus');
        
    }
}
