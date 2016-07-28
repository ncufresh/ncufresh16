<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use DB;
use Illuminate\Support\Facades\Storage;
use App\Buildingcategory;
use App\Building;
use App\Buildingimg;
use App\mapobject;

class CampusController extends Controller {

    public function index() {

        return view('campus.index', [
        ]);
    }

    public function guide() {
        $building = Building::all();
        $mapDatas = DB::table('mapobjects')
                ->select('mapobjects.*', 'Buildings.*', 'mapobjects.id as objId')
                ->join('Buildings', 'mapobjects.Building_id', '=', 'Buildings.id')
                ->get();
        $buildimgs = Buildingimg::all();
//        return $mapDatas;
        return view('campus.guide.guide', [
            'building' => $building,
            'mapDatas' => $mapDatas,
            'buildimgs' => $buildimgs,
        ]);
    }

    public function newData() {
        $category = Buildingcategory::all();

        $building = Building::all();

        return view('campus.guide.newData', [
            'categorys' => $category, 'building' => $building,
        ]);
    }

    public function createData(Request $request) {//oldfunction
        $building = new Building;
        $building->building_id = $request->building_id;
        $building->buildingName = $request->buildingName;
        $building->buildingExplain = $request->buildingExplain;
        $building->imgUrl = $request->imgUrl;
        $building->save();
        return redirect('smallgame');
    }

    public function createBuilding(Request $request) {
        //驗證
        $validator = Validator::make($request->all(), array(
                    'building_id' => 'required',
                    'buildingName' => 'required',
                    'buildingExplain' => 'required',
                    'imgUrl' => 'mimes: jpg,jpeg,png,pmb,gif,svg|max:100',
        ));

        if ($validator->fails()) {
            //驗證失敗
            return response()->json(array(
                        'fail' => true,
                        'errors' => $validator->getMessageBag()->toArray()
                            ), 400);
        } else {
            //驗證通過
            if ($request->hasFile('imgUrl')) {

                $img = $request->file('imgUrl');
                $upload = 'img/campus';
                $filename = uniqid() . "." . $request->file('imgUrl')->getClientOriginalExtension();
                $success = $img->move($upload, $filename); //將檔案傳至指定路由 並用亂碼命名
            }


            //無圖檔也會更新建築物資料
            $building = new Building;
            $building->building_id = $request->building_id;
            $building->buildingName = $request->buildingName;
            $building->buildingExplain = $request->buildingExplain;
            $building->save();

            //將圖片路徑存至圖片資料庫
            if ($request->hasFile('imgUrl')) {
                $newBuilding = DB::table('buildings')->where('buildingName', $request->buildingName)->first();

                $buildImg = new Buildingimg;
                $buildImg->imgUrl = $filename;
                $buildImg->BuildingId = $newBuilding->id;
                $buildImg->BuildingName = $request->buildingName;
                $buildImg->save();
            }


            return response()->json($building);
        }
    }

    public function getBuilding($bid) {
        $building = Building::find($bid);
        return response()->json($building);
    }

    public function putbuilding(Request $request, $bid) {

        $validator = Validator::make($request->all(), array(
                    'building_id' => 'required',
                    'buildingName' => 'required',
                    'buildingExplain' => 'required',
                    'imgUrl' => 'mimes: jpg,jpeg,png,pmb,gif,svg|max:500',
        ));

        if ($validator->fails()) {
            return response()->json(array(
                        'fail' => true,
                        'errors' => $validator->getMessageBag()->toArray()
                            ), 400);
        } else {

            if ($request->hasFile('imgUrl')) {

                $img = $request->file('imgUrl');
                $upload = 'img/campus';
                $filename = uniqid() . "." . $request->file('imgUrl')->getClientOriginalExtension();
                $success = $img->move($upload, $filename); //將檔案傳至指定路由 並用亂碼命名
            }

            $building = Building::find($bid);
            $building->buildingName = $request->buildingName;
            $building->building_id = $request->building_id;
            $building->buildingExplain = $request->buildingExplain;
            //$building->imgUrl = $request->imgUrl;
            $building->save();

            //將圖片路徑存至圖片資料庫
            if ($request->hasFile('imgUrl')) {
                $newBuilding = DB::table('buildings')->where('buildingName', $request->buildingName)->first();

                $buildImg = new Buildingimg;
                $buildImg->imgUrl = $filename;
                $buildImg->BuildingId = $newBuilding->id;
                $buildImg->BuildingName = $request->buildingName;
                $buildImg->save();
            }

            return response()->json($building);
        }
    }

    public function dropBuilding($bid) {

        $imgsNeedDel = DB::table('buildingimgs')->where('BuildingId', $bid)->get();

        foreach ($imgsNeedDel as $imgNeedDel) {
            $path = 'img/campus/';
            $filename = $imgNeedDel->imgUrl;
            unlink($path . $filename);
        }


        DB::table('buildingimgs')->where('BuildingId', $bid)->delete();


        $building = Building::destroy($bid);
        return response()->json($building);
    }

    public function getBuildingImg($imgid) {
        $img = DB::table('buildingimgs')->where('BuildingId', '=', $imgid)->get();
        return response()->json($img);
    }

    public function newBuildingImg(Request $request, $bid) {
        $validator = Validator::make($request->all(), array(
                    'inputImg' => 'mimes: jpg,jpeg,png,pmb,gif,svg|max:500',
        ));
        if ($validator->fails()) {
            return response()->json(array(
                        'fail' => true,
                        'errors' => $validator->getMessageBag()->toArray()
                            ), 400);
        } else {
            $img = $request->file('inputImg');
            $upload = 'img/campus';
            $filename = uniqid() . "." . $request->file('inputImg')->getClientOriginalExtension();
            $success = $img->move($upload, $filename); //將檔案傳至指定路由 並用亂碼命名



            $buildImg = new Buildingimg;
            $buildImg->imgUrl = $filename;
            $buildImg->BuildingId = $bid;
            $buildImg->save();

            return response()->json($buildImg);
        }
    }

    public function dropBuildingImg($bid) {
        $img = DB::table('buildingimgs')->where('id', '=', $bid)->first();
        $path = 'img/campus/';
        $filename = $img->imgUrl;



        unlink($path . $filename);

        $imgNeedDel = Buildingimg::destroy($bid);
        return response()->json($imgNeedDel);
    }

    public function newObj() {
        $building = Building::all();
        $mapobjs = mapobject::all();

        $mapData = DB::table('mapobjects')
                ->join('Buildings', 'mapobjects.Building_id', '=', 'Buildings.id')
                ->select('mapobjects.*', 'Buildings.buildingName')
                ->get();
        //return $mapData;
        return view('campus.guide.newObj', [
            'building' => $building,
            'mapobjs' => $mapobjs,
            'mapData' => $mapData
        ]);
    }

    public function createObj(Request $request) {
        //驗證
        $validator = Validator::make($request->all(), array(
                    'Building_id' => 'required',
                    'Xcoordinate' => 'required',
                    'Ycoordinate' => 'required',
                    'objWidth' => 'required',
                    'objImg' => 'mimes: jpg,jpeg,png,pmb,gif,svg|max:500|required',
        ));

        if ($validator->fails()) {
            //驗證失敗
            return response()->json(array(
                        'fail' => true,
                        'errors' => $validator->getMessageBag()->toArray()
                            ), 400);
        } else {
            if ($request->hasFile('objImg')) {

                $img = $request->file('objImg');
                $upload = 'img/campus';
                $filename = uniqid() . "." . $request->file('objImg')->getClientOriginalExtension();
                $success = $img->move($upload, $filename); //將檔案傳至指定路由 並用亂碼命名

                $mapobject = new mapobject;
                $mapobject->Building_id = $request->Building_id;
                $mapobject->Xcoordinate = $request->Xcoordinate;
                $mapobject->Ycoordinate = $request->Ycoordinate;
                $mapobject->objWidth = $request->objWidth;
                $mapobject->objImg = $filename;
                $mapobject->save();

                $mapData = DB::table('mapobjects')
                        ->select('mapobjects.*', 'Buildings.*', 'mapobjects.id as objId')
                        ->join('Buildings', 'mapobjects.Building_id', '=', 'Buildings.id')
                        ->where('mapobjects.objImg', $filename)
                        ->first();

                return response()->json($mapData);
            }
        }
    }

    public function getObj($bid) {
        $mapobjects = DB::table('mapobjects')
                ->where('id', $bid)
                ->first();
        return response()->json($mapobjects);
    }

    public function updateObj(Request $request, $bid) {
        $validator = Validator::make($request->all(), array(
                    'edXcoordinate' => 'required',
                    'edYcoordinate' => 'required',
                    'edobjWidth' => 'required',
        ));

        if ($validator->fails()) {
            //驗證失敗
            return response()->json(array(
                        'fail' => true,
                        'errors' => $validator->getMessageBag()->toArray()
                            ), 400);
        } else {
            $mapobject = mapobject::find($bid);
            $mapobject->Xcoordinate = $request->edXcoordinate;
            $mapobject->Ycoordinate = $request->edYcoordinate;
            $mapobject->objWidth = $request->edobjWidth;
            $mapobject->save();

            $newmapData = DB::table('mapobjects')
                    ->select('mapobjects.*', 'Buildings.*', 'mapobjects.id as objId')
                    ->join('Buildings', 'mapobjects.Building_id', '=', 'Buildings.id')
                    ->where('Buildings.id', $bid)
                    ->first();
//            return response()->json($newmapData);


            return response()->json($mapobject);
        }
    }

    public function dropObj($bid) {
        $obj = DB::table('mapobjects')->where('id', '=', $bid)->first();
        $path = 'img/campus/';
        $filename = $obj->objImg;



        unlink($path . $filename);

        $objNeedDel = mapobject::destroy($bid);
        return response()->json($objNeedDel);
    }
    public function getIndexBuilding($bid){
        $mapDatas = DB::table('mapobjects')
                ->select('mapobjects.*', 'Buildings.*', 'mapobjects.id as objId')
                ->join('Buildings', 'mapobjects.Building_id', '=', 'Buildings.id')
                ->where('mapobjects.Building_id',$bid)
                ->first();
        $buildimgs = DB::table('buildingimgs')
                ->where('BuildingId',$bid)
                ->get();
//        return $buildimgs;
        return response()->json([$mapDatas,$buildimgs]);
                        
    }

}
