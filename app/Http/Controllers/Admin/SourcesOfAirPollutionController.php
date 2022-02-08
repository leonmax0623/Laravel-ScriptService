<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SourcesOfAirPollution;
use Illuminate\Http\Request;

class SourcesOfAirPollutionController extends Controller
{
    // SOAP --- Sources Of Air Pollution

    protected $soapModel;

    public function __construct(){
        $this->soapModel = new SourcesOfAirPollution();
    }

    public function getSOAP(){
        $message = '';
        try {
            $data = [
                'source_id' => \request()->get('source_id'),
                'name' => \request()->get('name'),
            ];

            $message = $this->soapModel->saveSOAP($data);
        } catch (\Throwable $exception){

        }

        $sources = $this->soapModel->getSOAP();

        return view('admin.dashboard.sourcesOfAirPollution', compact('sources', 'message'));
    }

    public function deleteSOAP(){
        if (isset(request()->id) && request()->id != null){
            $sourceId = request()->id;

            $this->soapModel->deleteSOAP($sourceId);
        }

        $sources = $this->soapModel->getSOAP();

        return view('admin.dashboard.sourcesOfAirPollution', compact('sources'));
    }

    public function issetSOAPName(){
        $data['error'] = false;
        if (isset($_REQUEST['name']) && $_REQUEST['name'] != ""){
            $data['error'] = $this->soapModel->issetSOAPName($_REQUEST['name']);
        }
        echo json_encode($data);
    }
}
