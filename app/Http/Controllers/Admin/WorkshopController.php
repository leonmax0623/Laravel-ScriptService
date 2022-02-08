<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Workshop;
use App\Models\Project;
use App\Models\ProjectObject;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    protected $workshopModel;

    public function __construct() {
        $this->workshopModel = new Workshop();
    }

    public function index(){
        $project = new Project();
        $projects =  $project->getAllProject(null);
        $allWorkshops = $this->workshopModel->getAllWorkshops();
        return view('admin.workshop.workshop', compact('allWorkshops', 'projects'));
    }

    public function deleteWorkshop(){
        $data = [];
        $data['error'] = true;
        if (isset($_REQUEST['deleteWorkshopId'])){
            $this->workshopModel->deleteWorkshop($_REQUEST['deleteWorkshopId']);
            $data['error'] = false;
        }
        return $data;
    }

    public function saveWorkshop(Request $request){
        $get = '?';

        if (isset($_GET['email']) && $_GET['email'] != ''){
            $get .= $_GET['email'];
        }

        if (isset($_GET['projectSearchId']) && $_GET['projectSearchId'] != ''){
            if ($get == '?'){
                $get .= $_GET['projectSearchId'];
            } else {
                $get .= '&' . $_GET['projectSearchId'];
            }
        }

        try {
            $data = [
                'workshop_id' => $request->workshop_id,
                'name' => $request->name,
                'project_id' => $request->project_id,
                'object_id' => $request->object_id,
            ];

            $this->workshopModel->saveWorkshop($data);
        } catch (\Throwable $throwable){
            return redirect('/admin/workshop' . ($get == '?' ? '' : $get));
        }

        return redirect('/admin/workshop' . ($get == '?' ? '' : $get));
    }

    public function getSearchWorkshop(Request $request){
        $email = $request->email;
        $projectId = $request->projectSearchId;

        if ($email == null && $projectId == null) {
            return redirect('/admin/workshop');
        }

        $allWorkshops = $this->workshopModel->getSearchWorkshop($email, $projectId);

        $project = new Project();
        $projects =  $project->getAllProject(null);

        return view('admin.workshop.workshop', compact('allWorkshops', 'projects'));
    }
}
