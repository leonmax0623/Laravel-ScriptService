<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Tariff;
use Illuminate\Http\Request;

class TariffController extends Controller
{
    protected $tariffModel;

    public function __construct(){
        $this->tariffModel = new Tariff();
    }

    public function index(){
        $allTariffs = $this->tariffModel->getAllTariffs();
        return view('admin.tariff.tariff', compact('allTariffs'));
    }

    public function saveTariff(Request $request){
        $message = '';
        try {
            $data = [
                'tariff_id' => $request->tariff_id,
                'name' => $request->name,
                'price' => $request->price,
            ];

            $message = $this->tariffModel->saveTariff($data);
            $allTariffs = $this->tariffModel->getAllTariffs();
            return view('admin.tariff.tariff', compact('allTariffs', 'message'));
        } catch (\Throwable $throwable){

        }

        redirect('/admin/tariff');
    }
}
