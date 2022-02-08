<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Admin\Organization;
use App\Models\City;
use App\Models\Project;
use App\Models\ProjectObject;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected $project;


    public function __construct(){
        $this->project = new Project();
    }

    public function index(Request $request){
        $userId = auth()->user()->id;
        if ($userId != null){
            $allProject = $this->project->getUserProject($userId,$request->status,$request->organizationId);
            $organization = new Organization();
            $allOrganization = $organization->getUserOrganizations($userId,null,true);
            $projectOrganization = $organization->getUserOrganizationsProject($userId);
            return view('pages.account.project.index', compact('allProject','userId','allOrganization','projectOrganization'));
        }
    }

    public function createUserProject(Request $request){
        $userId = auth()->user()->id;
        if ($userId != null){
            if ($request->project_name != null) {
                $data = [];
                $data['project_name'] = $request->project_name;
                $data['organizationId'] = $request->organization;
                $data['project_description'] = $request->project_description;
                $data['user_id'] = $request->user_id;
                $data['project_status'] = $request->project_status;
                $this->project->createUserProject($data);
            }
            return redirect()->route('project.index');
        }else{
            return redirect('/login');
        }
    }
    public function projectInfo(Request $request){
        $userId = auth()->user()->id;
        if ($userId != null){
            if ($request->id != null) {
                $object = new ProjectObject();
                $city = new City();
                $regions = $city->getAllRegions();
                $tempRegions = [];
                for ($i = 0; $i < count($regions); $i++){
                    $tempRegions[$regions[$i]->city_id] = $regions[$i];
                }
                $regions = $tempRegions;
                $cities = $city->getAllCitiesPaginate(true,$userId);
                $projectInfo = $this->project->getProjectiInfo($request->id);
                $organization = new Organization();
                $allUserOrganization = $organization->getUserOrganizations($userId,null,true);
                $allUserObject = $object->getAllUserObject($userId,$request->id);
                return view('pages.account.project.projectInfo', compact('projectInfo','allUserObject','cities','regions','allUserOrganization'));
            }
        }else{
            return redirect('/login');
        }
    }
    public function deletedProject(Request $request){
        $data = [];
        $data['error'] = true;
        if (isset($_REQUEST['deleteProjectId'])){
            $this->project->deletedProject($_REQUEST['deleteProjectId']);
            $data['error'] = false;
        }
        return $data;
    }

    public function projectUpdate(Request $request){
        $userId = auth()->user()->id;
        if ($userId != null){
            $data = [];
            $data['project_id'] = $request->project_id;
            $data['project_name'] = $request->project_name;
            $data['description'] = $request->description;
            $data['project_status'] = $request->project_status;
            $data['organization_id'] = $request->organization_id;
            $this->project->updateProject($data);
            return redirect('/account/project/'.$data['project_id']);
        }else{
            return redirect('/login');
        }
    }

    public function issetProjectName(){
        $data['error']  = false;
        if (isset($_REQUEST['project_name']) && $_REQUEST['project_name'] != ""){
            $data['error'] = $this->project->issetProjectName($_REQUEST['project_name']);
        }
        echo json_encode($data);
    }

}
