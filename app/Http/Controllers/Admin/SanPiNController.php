<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SanPiN;
use Illuminate\Http\Request;

class SanPiNController extends Controller
{
    protected $sanpinModel;

    public function __construct(){
        $this->sanpinModel = new SanPiN();
    }

    public function getSanpin(){
        $sanpin = $this->sanpinModel->getAllSanpin();

        return view('admin.dashboard.sanpin', compact('sanpin'));
    }


    public function getSearchSanpin(Request $request){
        $name = $request->name;

        if ($name == null) {
            return redirect('/admin/directory/sanpin');
        }

        $sanpin = $this->sanpinModel->getSearchSanpin($name);

        return view('admin.dashboard.sanpin', compact('sanpin'));
    }
}
