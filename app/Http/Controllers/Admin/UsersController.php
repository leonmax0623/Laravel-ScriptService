<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Organization;
use App\Models\Finance;
use App\Models\Project;
use App\Models\Admin\Users;
use App\Models\User;
use App\Models\City;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UsersController extends BaseController
{
    public $users;

    public function __construct()
    {
        $this->users =  new Users();
    }

    public function index(){
        $allUsers = $this->users->getAllUsers();
        $City = new City();
        $cities = $City->getAllCities();
        $usecities = $City->getUsesCities();
        return view('admin.dashboard.users',compact('allUsers','cities','usecities'));
    }
    public function getUserInfo(Request $request){
        if (isset(request()->id) && request()->id != null){
            $userId = request()->id;
            //$organization = new Organization();
            //$project = new Project();
            //$allOrganization = $organization->getUserOrganizations($userId,null,true);
            $allOrganization = [];
            $userInfo = $this->users->getUserInfo($userId);
            $userAdminRole = $this->users->getUserRole($userId);
            //$userProject = $project->getUserProject($userId,$request->status);
            $userProject = [];
           // if ($userInfo == null){
           //     return redirect()->route('admin.users');
           // }else{
            $City = new City();
            $cities = $City->getAllCities();
                return view('admin.dashboard.userPage',compact('userInfo','cities','allOrganization','userProject', 'userAdminRole'));
         //   }
        }else{
            return redirect()->route('admin.users');
        }
    }
    public function deleteUser(){
        if (isset(request()->id) && request()->id != null){
            $userId = request()->id;
            $this->users->deleteUser($userId);
        }
        return redirect()->route('admin.users');

    }
    public function activeUser(){
        if (isset(request()->id) && request()->id != null){
            $userId = request()->id;
            $this->users->activeUser($userId);
            return redirect('admin/users/'.$userId);
        }else{
            return redirect()->route('admin.users');
        }

    }
    public function blockUser(){
        if (isset(request()->id) && request()->id != null){
            $userId = request()->id;
            $this->users->blockUser($userId);
            return redirect('admin/users/'.$userId);
        }else{
            return redirect()->route('admin.users');
        }

    }
    public function updateUserProfile(){
        $data = [];
        $data['error'] = false;
        if (isset($_POST) && isset($_POST['user_id'])){
            $res = $this->users->updateUserProfile($_POST);
        }
        echo json_encode($data);
    }
    public function getSearchUser(Request $request){
        $email = $request->email;
        $status = $request->status;
        $role = $request->role;
        if ($status == -1){
            $status = null;
        }
        if ($role == -1){
            $role = null;
        }
        if ($email== null && $status == null && $role == null) {
            $allUsers = $this->users->getAllUsers();
        }else{
            $allUsers = $this->users->getSearchUser($email,$status,$role);
        }
        return view('admin.dashboard.users',compact('allUsers'));

    }
    public function getUserOrganizations(Request $request){
        if ($request->id != null){
            $userId = $request->id;
            $organization = new Organization();
            if ($request->organizationName != null){
                $allOrganization = $organization->getUserOrganizations($userId, $request->organizationName);
            }else{
                $allOrganization = $organization->getUserOrganizations($userId);
            }
            $userInfo = $this->users->getUserInfo($userId);
            $userAdminRole = $this->users->getUserRole($userId);
            return view('admin.dashboard.userOrganization',compact('userInfo','allOrganization', 'userAdminRole'));
        }else {
            return redirect()->route('admin.users');
        }
    }

    public function setUserOrganization(Request $request){
        if (isset($request->inn) && $request->inn) {
            $data = [
                'inn' => $request->inn,
                'name' => $request->name,
                'full_name' => $request->full_name,
                'ogrn' => $request->ogrn,
                'kpp' => $request->kpp,
                'legal_address' =>$request->legal_address,
                'actual_address' => $request->actual_address,
                'user_id' => $request->user_id,
            ];
            $organization = new Organization();
            $organization->setUserOrganization($data);
            return redirect('admin/userOrganization/'.$data['user_id']);
        }else{
            return redirect()->route('admin.users');
        }
    }

    public function createUserProject(Request $request){
        if ($request->user_id != null) {
            if ($request->project_name != null) {
                $data = [];
                $data['project_name'] = $request->project_name;
                $data['organizationId'] = $request->organization;
                $data['project_description'] = $request->project_description;
                $data['user_id'] = $request->user_id;
                $data['project_status'] = $request->project_status;
                $project = new Project();
                $project->createUserProject($data);
                return redirect('admin/users/'.$request->user_id);
            }else{
                return redirect('admin/users/'.$request->user_id);
            }
        }else{
            return redirect()->route('admin.users');
        }
//        dd($request);
        return false;
    }
    public function deleteProject(Request $request){
        if (isset($request->id) && $request->id != null){
            $projectId = $request->id;
            $project = new Project();
            $project->deleteProject($projectId);
        }
        return redirect()->route('admin.project');
    }

    public function createUser(Request $request){
        if ($request->email !=null){
            $data = [];
            $data['email'] = $request->email;
            $data['password'] =  Hash::make($request->password);
            $data['last_name'] = $request->last_name;
            $data['first_name'] = $request->first_name;
            // $data['birth_date'] = $request->birth_date;
            $data['emailCorrect'] = $request->emailCorret;
            $data['userRole'] = $request->userRole;
            $data['userCity'] = $request->userCity;
            // $data['companyName'] = $request->companyName;
            $this->users->createNewUsers($data);
        }
        return redirect()->route('admin.users');
    }

    public function setrole($userId, $role){
        if(in_array($role, ['user', 'admin'])){
            $user = User::where('id', $userId)->first();
            if($user){
                if($user->hasRole('user')){
                    $user->removeRole('user');
                }
                if($user->hasRole('admin')){
                    $user->removeRole('admin');
                }
                $user->assignRole($role);
            }
        }
        return redirect('/admin/users/' . $userId);
    }

    public function userBalance(Request $request){
        if ($request->id != null){
            $finance = new Finance();
            $financeType = $finance->getAllFinanceType();
            $userId = $request->id;
            $finance = new Finance();
            $financeActivity = $finance->getFinanceActivity($userId);
            $userInfo = $this->users->getUserInfo($userId);
            $userAdminRole = $this->users->getUserRole($userId);
            $City = new City();
            $cities = $City->getAllCities();
            return view('admin.dashboard.userBalance',compact('userInfo','cities','financeType','financeActivity', 'userAdminRole'));
        }else {
            return redirect()->route('admin.users');
        }
    }
    public function topUpUserAccount(Request $request){
        if (isset($request->sum)){
            $data = [];
            $data['sum'] = $request->sum;
            $data['type_id'] = $request->type_id;
            $data['user_id'] = $request->user_id;
            $finance = new Finance();
            $res = $finance->topUpUserAccount($data);
            if ($res){
                return redirect('/admin/userBalance/'.$data['user_id']);
            }else{
                return redirect()->route('admin.users');
            }
        }else{
            return redirect()->route('admin.users');
        }
    }
}
