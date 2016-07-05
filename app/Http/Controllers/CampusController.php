<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;

use App\Http\Requests;


use App\buildingcategory;

use App\Building;

class CampusController extends Controller
{
    public function index()
    {
       
        return view('campus.index', [
            
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
        
        $building = Building::all();
            
        return view('campus.guide.newData',[
            'categorys'=>$category,'building'=>$building,
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
    public function createBuilding(Request $request){
        $building = Building::create($request->all());
        return response()->json($building);
    }
    
    public function getBuilding($bid){
        $building = Building::find($bid);
        return response()->json($building);
    }
    public function putbuilding(Request $request,$bid){
        $building = Building::find($bid);
        $building->buildingName = $request->buildingName;
        $building->building_id = $request->building_id;
        $building->buildingExplain = $request->buildingExplain;
        $building->imgUrl = $request->imgUrl;
        $building->save();
        return response()->json($building);
    }
    public function dropBuilding($bid){
        $building = Building::destroy($bid);
        return response()->json($building);
    }
}
