<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Fomvasss\Dadata\Facades\DadataSuggest;


class INNContrloller extends Controller
{
    public function getINNInfo()
    {
        if (isset($_GET['inn']) && $_GET['inn'] != "") {
            $arr = [];
            $result = DadataSuggest::partyById($_GET['inn'], ["branch_type" => "MAIN"]);
            if (isset($result['data'])) {
                $arr['full_name'] = isset($result['data']['name']['full_with_opf']) ? $result['data']['name']['full_with_opf'] : '';
                $arr['short_name'] = isset($result['data']['name']['short_with_opf']) ? $result['data']['name']['short_with_opf'] : isset($result['value']) ?? '';
                $arr['kpp'] = isset($result['data']['kpp']) ? $result['data']['kpp'] : '';
                $arr['ogrn'] = isset($result['data']['ogrn']) ? $result['data']['ogrn'] : '';
                $arr['inn'] = isset($result['data']['inn']) ? $result['data']['inn'] : '';
                $arr['legal_address'] = isset($result['data']['address']['unrestricted_value']) ? $result['data']['address']['unrestricted_value'] : '';
            }
            echo json_encode($arr);
        }
    }
}
