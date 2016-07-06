<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;

use Illuminate\Support\Facades\Validator;

use App\Http\Requests;


use App\Buildingcategory;

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
        $category = Buildingcategory::all();

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
        $validator = Validator::make($request->all(),array(
            'building_id' => 'required',
            'buildingName' => 'required',
            'buildingExplain' => 'required',
            'imgUrl' => 'required',
        ));

        if($validator->fails()){
            return response()->json(array(
            'fail' => true,
            'errors' => $validator->getMessageBag()->toArray()
            ),400);
        }


        $img =Input:: file('imgUrl');
        $upload = 'upload/img';
        $filename = uniqid();
        $success = $img->move($upload,$filename);


        if($success){

            $building = Building::create($request->all());
            $building->imgUrl = $filename;
            $building->save();

            return response()->json($building);
        }


    }

    public function getBuilding($bid){
        $building = Building::find($bid);
        return response()->json($building);
    }
    public function putbuilding(Request $request,$bid){

        $validator = Validator::make($request->all(),array(
            'building_id' => 'required',
            'buildingName' => 'required',
            'buildingExplain' => 'required',
            'imgUrl' => 'required|max:100',
        ));

        if($validator->fails()){
            return response()->json(array(
            'fail' => true,
            'errors' => $validator->getMessageBag()->toArray()
            ),400);
        }

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
