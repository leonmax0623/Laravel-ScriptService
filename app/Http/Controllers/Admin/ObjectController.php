<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\ProjectObject;
use Illuminate\Http\Request;

class ObjectController extends Controller
{
    protected $object;

    public function __construct(){
        $this->object = new ProjectObject();
    }

    public function index(){
        $allObject = $this->object->getAllOblect();
        return view('admin.dashboard.object', compact('allObject'));
    }
    public function deletedObject(){
        $data = [];
        $data['error'] = true;
        if (isset($_REQUEST['deleteObjectId'])){
            $this->object->deletedObject($_REQUEST['deleteObjectId']);
            $data['error'] = false;
        }
        return $data;
    }
    public function editObject(Request $request){
        if ($request->id != null) {
            $userId =  $this->object->getUserId($request->id);
            if (!$userId){
                return redirect('admin/object');
            }
            $objectInfo =  $this->object->getObjectInfo($request->id);
            $city = new City();
            $regions = $city->getAllRegions();
            $tempRegions = [];
            for ($i = 0; $i < count($regions); $i++){
                $tempRegions[$regions[$i]->city_id] = $regions[$i];
            }
            $regions = $tempRegions;
            $cities = $city->getAllCitiesPaginate(true,$userId);
            return view('admin.dashboard.editObject', compact('objectInfo','cities','regions'));
        }else{
            return redirect('admin/object');
        }
    }
    public function updateObject(Request $request){
        if ($request->object_id) {
            $userId =  $this->object->getUserId($request->object_id);
            if (!$userId){
                return redirect('admin/object');
            }
            $data = [];
            $data['cadastral_number'] = $request->cadastral_number;
            $data['project_id'] = $request->project_id;
            $data['object_id'] = $request->object_id;
            $data['object_description'] = $request->object_description;
            $data['object_number'] = $request->object_number;
            $data['regin_id'] = $request->regin_id;
            $data['city_id'] = $request->city_id;
            $data['city_name'] = $request->city_name;
            $data['object_name'] = $request->object_name;
            if ($data['city_id'] == -1) {
                $city = new City();
                $data['city_id'] = $city->addNewCity($data['city_name'], $data['regin_id'], $userId);
            }
            $this->object->updateObject($data);
            return redirect('admin/object');

        }else{
            return redirect('admin/object');
        }
    }

    public function getProjectObject(){
        $data = [];
        if (isset($_REQUEST['projectId'])){
            $data = $this->object->getProjectObject($_REQUEST['projectId']);
        }
        return $data;
    }

}
