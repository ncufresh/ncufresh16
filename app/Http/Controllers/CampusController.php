<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;

use Illuminate\Support\Facades\Validator;

use App\Http\Requests;

use Symfony\Component\HttpFoundation\File\UploadedFile;

use DB;


use App\Buildingcategory;

use App\Building;

use App\Buildingimg;


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
    public function createData(Request $request){//oldfunction
        $building = new Building;
        $building->building_id = $request->building_id;
        $building->buildingName = $request->buildingName;
        $building->buildingExplain = $request->buildingExplain;
        $building->imgUrl = $request->imgUrl;
        $building->save();
        return redirect('/campus');

    }
    public function createBuilding(Request $request){
        //驗證
        $validator = Validator::make($request->all(),array(
            'building_id' => 'required',
            'buildingName' => 'required',
            'buildingExplain' => 'required',
            'imgUrl' => 'mimes: jpg,jpeg,png,pmb,gif,svg|max:100',
        ));

        if($validator->fails()){
        //驗證失敗
            return response()->json(array(
            'fail' => true,
            'errors' => $validator->getMessageBag()->toArray()
            ),400);
        }else{
            //驗證通過
            if($request->hasFile('imgUrl')){
                           
            $img =$request->file('imgUrl');
            $upload = 'upload/img';
            $filename = uniqid().".".$request->file('imgUrl')->getClientOriginalExtension();
            $success = $img->move($upload,$filename);//將檔案傳至指定路由 並用亂碼命名
            
            }

            
            //無圖檔也會更新建築物資料
                $building = new Building;
                $building->building_id = $request->building_id;
                $building->buildingName = $request->buildingName;
                $building->buildingExplain = $request->buildingExplain;               
                $building->save();

                 //將圖片路徑存至圖片資料庫
                if($request->hasFile('imgUrl')){
                $newBuilding = DB::table('buildings')->where('buildingName', $request->buildingName)->first();
                
                $buildImg = new Buildingimg;
                $buildImg->imgUrl = $filename;
                $buildImg->BuildingId = $newBuilding->id;
                $buildImg->BuildingName = $request->buildingName;
                $buildImg ->save();
                }
                
                
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
            'imgUrl' => 'required|mimed: jpg,jpeg,png|max:100',
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
    public function getBuildingImg($imgid){
        $img = DB::table('buildingimgs')->where('BuildingId','=',$imgid)->get();
        return response()->json($img);
    }
}
