<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Admin\SourcesOfAirPollution;
use App\Models\Admin\Workshop;
use App\Models\Admin\SanPiN;
use App\Models\City;
use App\Models\Project;
use App\Models\ProjectObject;
use Illuminate\Http\Request;

class ObjectController extends Controller
{
    protected $object;


    public function __construct(){
        $this->object = new ProjectObject();
    }

    public function getCreateObjectForm(Request $request){
        if ($request->id != null && auth()->user()->id != null) {
            $userId = auth()->user()->id;
            $projectId = $request->id;
            $project = new Project();
            $project_info = $project->getProjectiInfo($projectId);
            $city = new City();
            $regions = $city->getAllRegions($userId);
            $tempRegions = [];
            for ($i = 0; $i < count($regions); $i++){
                $tempRegions[$regions[$i]->city_id] = $regions[$i];
            }
            $regions = $tempRegions;
            $cities = $city->getAllCitiesPaginate(true,$userId);
            return view('pages.account.object.index', compact('projectId', 'userId', 'regions', 'cities', 'project_info'));
        }
    }
    public function updateObject(Request $request){
        $userId = auth()->user()->id;
            if ($userId != null) {
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
                return redirect('account/project/'.$data['project_id']);

            }else{
                return redirect('account/project');
            }
        }

    public function createObject(Request $request){
        $userId = auth()->user()->id;
        if ($userId != null) {
            $data = [];
            $data['project_id'] = $request->id;
            $data['cadastral_number'] = $request->cadastral_number;
            $data['object_description'] = $request->object_description;
            $data['object_number'] = $request->object_number;
            $data['regin_id'] = $request->regin_id;
            $data['city_id']= $request->city_id;
            $data['city_name'] = $request->city_name;
            $data['object_name'] = $request->object_name;
            if ($data['city_id'] == -1) {
                $city = new City();
                $data['city_id'] = $city->addNewCity($data['city_name'], $data['regin_id'],$userId);
            }

            $this->object->addNewObject($data);
            return redirect('account/project/'.$data['project_id']);
        }else{
            return redirect('account/project');

        }
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
        $userId = auth()->user()->id;
        if ($userId != null) {
            $objectInfo =  $this->object->getObjectInfo($request->id);
            $project = new Project();
            $project_info = $project->getProjectiInfo($objectInfo->project_id);
            $city = new City();
            $regions = $city->getAllRegions();
            $tempRegions = [];
            for ($i = 0; $i < count($regions); $i++){
                $tempRegions[$regions[$i]->city_id] = $regions[$i];
            }
            $regions = $tempRegions;
            $cities = $city->getAllCitiesPaginate(true,$userId);
            return view('pages.account.object.editObject', compact('objectInfo','cities', 'regions', 'project_info'));
        }else{
            return redirect('account/project');
        }
    }

    public function issetObjectName(){
        $data['error']  = false;
        if (isset($_REQUEST['object_name']) && $_REQUEST['object_name'] != ""){
            $data['error'] = $this->object->issetObjectName($_REQUEST['object_name']);
        }
        echo json_encode($data);
    }

    public function objectInfo(Request $request){
        $userId = auth()->user()->id;
        if ($userId != null) {
            $workshop = new Workshop();
            $sourcesOfAirPollution = new SourcesOfAirPollution();
            $allSourcesOfAirPollutionType = $sourcesOfAirPollution->getAllSourcesOfAirPollution();
            $objectWorkshop = $workshop->getObjectWorkshop($request->object_id);
            $objectIsa = $workshop->getObjectIsa($request->object_id);
            $objectEmissionSources = [];
            $objectInfo =  $this->object->getObjectInfo($request->object_id);
            $sanpin = new SanPiN();
            $allSanPin = $sanpin->getAllSanpin(true);
            $project_id = $request->project_id;
            $project = new Project();
            $project_info = $project->getProjectiInfo($request->project_id);
            return view('pages.account.object.objectInfo',compact('objectInfo','project_id','objectWorkshop','objectEmissionSources','allSourcesOfAirPollutionType','objectIsa', 'project_info','allSanPin'));
        }else{
            return redirect('/login');
        }
    }

    public function createWorkshop(Request $request){
        $userId = auth()->user()->id;
        if ($userId != null){
            $data = [];
            $data['project_id'] =  $request->project_id;
            $data['object_id'] =  $request->object_id;
            $data['user_id'] =  $userId;
            $data['workshop_name'] =  $request->workshop_name;
            $data['workshop_id'] =  $request->workshop_id;
            $workshop = new Workshop();
            if ($request->workshop_id != null){
                $workshop->updateWorkshop($data);

            }else{
                $workshop->addNewWorkshop($data);
            }
            return redirect('/account/project/'.$data['project_id'].'/object/'. $data['object_id']);
        }else{
            return redirect('/login');
        }
    }

    public function createEmissionSources(Request $request){
        $userId = auth()->user()->id;
        if ($userId != null){
            $data = [];
            $data['project_id'] =  $request->project_id;
            $data['object_id'] =  $request->object_id;
            $data['isa_id'] =  $request->isa_id;
            $data['iv_number'] =  $request->iv_number;
            $data['iv_name'] =  $request->iv_name;
            $data['iv_highlighting'] =  $request->iv_highlighting;
            $data['iv_gross_allocation'] =  $request->iv_gross_allocation;
            $data['iv_working_days'] =  $request->iv_working_days;
            $data['iv_working_hours'] =  $request->iv_working_hours;
            $data['iv_id'] = $request->iv_id;
            $workshop = new Workshop();
            if ($request->iv_id != null){
                $workshop->updateEmissionSources($data);
            }else{
                $workshop->createEmissionSources($data);
            }
            return redirect('/account/project/'.$data['project_id'].'/object/'. $data['object_id']);
        }else{
            return redirect('/login');
        }
    }

    public function deleteEmissionSources(Request $request){
        $userId = auth()->user()->id;
        if ($userId != null){
            $data = [];
            $data['project_id'] =  $request->project_id;
            $data['object_id'] =  $request->object_id;
            $data['emission_sources_id'] =  $request->emission_sources_id;
            $workshop = new Workshop();
            $workshop->deleteEmissionSources($data);
            return redirect('/account/project/'.$data['project_id'].'/object/'. $data['object_id']);
        }else{
            return redirect('/login');
        }
    }
    public function createIsa(Request $request){
        $userId = auth()->user()->id;
        if ($userId != null){
            $data = [];
            $data['project_id'] =  $request->project_id;
            $data['object_id'] =  $request->object_id;
            $data['workshop_id'] =  $request->workshop_id;
            $data['isa_name'] = $request->isa_name;
            $data['isa_type'] = $request->isa_type;
            $data['isa_source'] = $request->isa_source;
            $data['isa_height'] = $request->isa_height;
            $data['isa_diameter'] = $request->isa_diameter;
            $data['isa_number'] = $request->isa_number;
            $data['isa_id'] = $request->isa_id;
            $data['isa_x1'] = $request->isa_x1;
            $data['isa_y1'] = $request->isa_y1;
            $data['isa_x2'] = $request->isa_x2;
            $data['isa_y2'] = $request->isa_y2;
            $data['isa_width'] = $request->isa_width;
            $data['isa_speed'] = $request->isa_speed;
            $data['isa_volume'] = $request->isa_volume;
            $data['isa_temperature'] = $request->isa_temperature;
            $data['isa_density'] = $request->isa_density;
            $data['isa_terrain_correction_factor'] = $request->isa_terrain_correction_factor;
            if ($data['isa_type'] == null){
                $data['isa_type'] = 0;
            }
            $workshop = new Workshop();
            if ($request->isa_id != null){
                $workshop->updateIsa($data);
            }else {
                $workshop->createIsa($data);
            }
            return redirect('/account/project/'.$data['project_id'].'/object/'. $data['object_id']);
        }else{
            return redirect('/login');
        }
    }

    public function getEmissionSources(Request $request){
        $data['error'] = false;
        if (isset($request->isa_id)){
            $workshop = new Workshop();
            $res = $workshop->getEmissionSources($request->isa_id);
            if ($res == null){
                $data['error'] = true;
            }else{
                $data['data'] = $res;
            }
        }else{
            $data['error'] = true;
        }
        echo json_encode($data);
    }

    public function copyIsa(Request $request){
        $userId = auth()->user()->id;
        if ($userId != null){
            $data = [];
            $data['project_id'] =  $request->project_id;
            $data['object_id'] =  $request->object_id;
            $data['isa_id'] =  $request->isa_id;
            $workshop = new Workshop();
            $workshop->copyIsa($data['isa_id']);
            return redirect('/account/project/'.$data['project_id'].'/object/'. $data['object_id']);
        }else{
            return redirect('/login');
        }
    }

    public function deleteIsa(Request $request){
        $userId = auth()->user()->id;
        if ($userId != null){
            $data = [];
            $data['project_id'] =  $request->project_id;
            $data['object_id'] =  $request->object_id;
            $data['isa_id'] =  $request->isa_id;
            $workshop = new Workshop();
            $workshop->deleteIsa($data['isa_id']);
            return redirect('/account/project/'.$data['project_id'].'/object/'. $data['object_id']);
        }else{
            return redirect('/login');
        }
    }

    public function getIsaObject(Request $request){
        $data['error'] = false;
        if (isset($request->isa_id)){
            $workshop = new Workshop();
            $res = $workshop->getIsaObject($request->isa_id);
            if ($res == null){
                $data['error'] = true;
            }else{
                $data['data'] = $res;
            }
        }else{
            $data['error'] = true;
        }
        echo json_encode($data);
    }

    public function  deleteWorkshop(Request $request){
        $userId = auth()->user()->id;
        if ($userId != null){
            $data = [];
            $data['project_id'] =  $request->project_id;
            $data['object_id'] =  $request->object_id;
            $data['workshop_id'] =  $request->workshop_id;
            $workshop = new Workshop();
            $workshop->deleteWorkshop($data['workshop_id']);
            return redirect('/account/project/'.$data['project_id'].'/object/'. $data['object_id']);
        }else{
            return redirect('/login');
        }
    }
}
