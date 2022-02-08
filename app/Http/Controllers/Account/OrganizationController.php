<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    protected $organizationModel;
    protected $organizations;


    public function __construct(){
        $this->organizationModel = new Organization();
    }

    public function getUserOrganizations(){

        $userId = auth()->user()->id;

        if ($userId != null) {
            $this->organizations = $this->organizationModel->getUserOrganizations($userId);
            $organizationProjects = $this->organizationModel->getProjectsStringForOrganization($this->organizations->items(), $userId);

            $this->addProjectsToOrganization($organizationProjects);
            $organizations = $this->organizations;

            return view('pages.account.organization.organization', compact('organizations'));
        }

        return redirect('/account/organization');
    }

    public function setOrganization(){

        $message = '';
        $userId = auth()->user()->id;

        if ($userId != null && isset($_POST['inn']) && $_POST['inn']) {
            $data = [
                'inn' => $_POST['inn'],
                'name' => $_POST['name'],
                'full_name' => $_POST['full_name'],
                'ogrn' => $_POST['ogrn'],
                'kpp' => $_POST['kpp'],
                'legal_address' => $_POST['legal_address'],
                'actual_address' => $_POST['actual_address'],
                'type' => $_POST['type'],
            ];

            $message = $this->organizationModel->setUserOrganization($userId, $data);

            $this->organizations = $this->organizationModel->getUserOrganizations($userId);
            $organizationProjects = $this->organizationModel->getProjectsStringForOrganization($this->organizations->items(), $userId);

            $this->addProjectsToOrganization($organizationProjects);
            $organizations = $this->organizations;

            return view('pages.account.organization.organization', compact('organizations', 'message'));

        }

        return redirect('/account/organization');
    }

    public function organizationSearch(){
        $userId = auth()->user()->id;

        if ($userId != null && isset($_GET['organizationName']) && $_GET['organizationName']){
            $organizationName = $_GET['organizationName'];

            $this->organizations = $this->organizationModel->getUserOrganizationsByName($userId, $organizationName);
            $organizationProjects = $this->organizationModel->getProjectsStringForOrganization($this->organizations->items(), $userId);

            $this->addProjectsToOrganization($organizationProjects);
            $organizations = $this->organizations;

            return view('pages.account.organization.organization', compact('organizations'));
        }
        return redirect('/account/organization');
    }

    public function deleteOrganization(){
        $userId = auth()->user()->id;

        if ($userId != null && isset(request()->id) && request()->id != null){
            $organizationId = request()->id;
            $this->organizationModel->deleteUserOrganization($userId, $organizationId);

            return redirect()->route('organization.organization');
        }
        return redirect('/account/organization');
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
