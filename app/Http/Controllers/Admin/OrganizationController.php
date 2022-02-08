<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Organization;
use App\Models\Admin\Users;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    protected $organizationModel;
    protected $organizations;

    public function __construct(){
        $this->organizationModel = new Organization();
    }

    public function index(){
        $usersModel = new Users();
        $users = $usersModel->getAllUsersForSelect();

        $this->organizations = $this->organizationModel->getOrganizations();
        $organizationProjects = $this->organizationModel->getProjectsStringForOrganization($this->organizations->items());
        $this->addProjectsToOrganization($organizationProjects);
        $organizations = $this->organizations;

        return view('admin.organization.organization', compact('organizations', 'users'));
    }

    public function setOrganization(){
        $message = '';

        if (isset($_POST['inn']) && $_POST['inn'] && isset($_POST['user_id']) && $_POST['user_id']) {
            $data = [
                'user_id' => $_POST['user_id'],
                'inn' => $_POST['inn'],
                'name' => $_POST['name'],
                'full_name' => $_POST['full_name'],
                'ogrn' => $_POST['ogrn'],
                'kpp' => $_POST['kpp'],
                'legal_address' => $_POST['legal_address'],
                'actual_address' => $_POST['actual_address'],
                'type' => $_POST['type'],
            ];

            $message = $this->organizationModel->setOrganization($data);
        }

        $usersModel = new Users();
        $users = $usersModel->getAllUsersForSelect();

        $this->organizations = $this->organizationModel->getOrganizations();
        $organizationProjects = $this->organizationModel->getProjectsStringForOrganization($this->organizations->items());
        $this->addProjectsToOrganization($organizationProjects);
        $organizations = $this->organizations;

        return view('admin.organization.organization', compact('organizations', 'users', 'message'));
    }

    public function deleteOrganization(){
        if (isset(request()->id) && request()->id != null){
            $organizationId = request()->id;
            $this->organizationModel->deleteOrganization($organizationId);
        }

        return redirect()->route('admin.organization');
    }

    public function organizationSearch(){

        if (isset($_GET['organizationName']) && $_GET['organizationName']){
            $organizationName = $_GET['organizationName'];
            $this->organizations = $this->organizationModel->getOrganizationsByName($organizationName);

            $usersModel = new Users();
            $users = $usersModel->getAllUsersForSelect();

            $organizationProjects = $this->organizationModel->getProjectsStringForOrganization($this->organizations->items());
            $this->addProjectsToOrganization($organizationProjects);
            $organizations = $this->organizations;

            return view('admin.organization.organization', compact('organizations', 'users'));
        }

        return redirect()->route('admin.organization');
    }

    public function issetUserOrganization(){
        $data['error'] = false;
        if (isset($_REQUEST['user_id']) && $_REQUEST['user_id'] != "" && isset($_REQUEST['inn']) && $_REQUEST['inn'] != ""){
            $data['error'] = $this->organizationModel->issetUserOrganization($_REQUEST['user_id'], $_REQUEST['inn']);
        }
        echo json_encode($data);
    }

    public function addProjectsToOrganization($projects){
        foreach ($this->organizations->items() as $item) {
            $item->projects = [];
            foreach ($projects as $itemProject) {
                if ($item->organization_id == $itemProject->organization_id){
                    $item->projects[$itemProject->project_id] = $itemProject->project_name;
                }
            }
        }
    }
}
