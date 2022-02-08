<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Users;
use App\Models\City;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class DashboardController extends BaseController
{

    public function index(){
        return view('admin.dashboard.index');
    }

    public function getCities(){
        $city = new City();

        if (isset($_POST['name']) && $_POST['name']) {
            $data = [
                'name' => $_POST['name'],
               // 'region_id' => $_POST['region_id'],
                'city_id' => isset($_POST['city_id']) && $_POST['city_id'] ? $_POST['city_id'] : false,
            ];
            $city->saveCity($data);
        }

        $cities = $city->getAllCitiesPaginate();

        return view('admin.cities', compact('cities'));
    }


    public function citySearch(){
        $city = new City();

        if (isset($_GET['cityName']) && $_GET['cityName']){
            $cityName = $_GET['cityName'];

            $cities = $city->getCitiesByName($cityName);

            return view('admin.cities', compact('cities'));
        }

        $cities = $city->getAllCitiesPaginate();

        return view('admin.cities', compact('cities'));
    }


    public function deleteCityData(){
        if (isset(request()->id) && request()->id != null){
            $city = new City();
            $cityId = request()->id;

            $city->deleteCityData($cityId);
        }

        $cities = $city->getAllCitiesPaginate();

        return view('admin.cities', compact('cities'));
    }

    public function getCityData(){
        $city = new City();

        $cityId = request()->id;

        $cityData = $city->getCityData($cityId);

        return view('admin.dashboard.city', compact('cityData'));

    }
}
