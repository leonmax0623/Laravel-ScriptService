<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\TemperatureStratification;
use App\Models\City;
use Illuminate\Http\Request;

class TemperatureStratificationController extends Controller
{
    // TTS - Territory Temperature Stratification

    protected $ttsModel;

    public function __construct(){
        $this->ttsModel = new TemperatureStratification();
    }

    public function getTTS(){
        $cityModel = new City();
        $regions = $cityModel->getAllRegions();
        $coefficientsData = $this->ttsModel->getTTS();

        return view('admin.dashboard.temperatureStratification', compact('coefficientsData', 'regions'));
    }

    public function saveTTS(Request $request){
        $message = '';

        try {
            $data = [
                'territory_id' => $request->territory_id,
                'name' => $request->name,
                'coefficient_a' => $request->coefficient_a,
            ];

            $regions = $request->region_ids;

            $type = $request->type;

            $message = $this->ttsModel->saveTTS($data, $regions, $type);
        } catch (\Throwable $throwable){
            return redirect('/admin/directory/territoryTemperatureStratification');
        }

        $cityModel = new City();
        $regions = $cityModel->getAllRegions();
        $coefficientsData = $this->ttsModel->getTTS();

        return view('admin.dashboard.temperatureStratification', compact('coefficientsData', 'regions', 'message'));
    }

    public function deleteTTS(){
        if (isset(request()->id) && request()->id != null){
            $territoryId = request()->id;

            $this->ttsModel->deleteTTS($territoryId);
        }

        return redirect('/admin/directory/territoryTemperatureStratification');
    }

    public function issetTTSName(){
        $data['error']  = false;
        if (isset($_REQUEST['name']) && $_REQUEST['name'] != ""){
            $data['error'] = $this->ttsModel->issetTTSName($_REQUEST['name']);
        }
        echo json_encode($data);
    }
}
