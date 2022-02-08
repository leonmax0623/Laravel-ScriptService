<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ProjectController extends BaseController
{
    public $project;

    public function __construct(){
        $this->project = new Project();
    }

    public function index(Request $request){
        $allProject = $this->project->getAllProject($request->email);
        return view('admin.dashboard.project',compact('allProject'));
    }

}
