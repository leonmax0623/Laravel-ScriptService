<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\UserDirectory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DirectoryController extends Controller
{
    protected $directoryModel;

    public function __construct(){
        $this->directoryModel = new UserDirectory();
    }

    public function getRegions(){
        $userId = auth()->user()->id;
        if ($userId == null){
            return redirect('/login');
        }

        if (isset($_POST['name']) && $_POST['name']) {
            $data = [
                'user_city_id' => isset($_POST['user_city_id']) && $_POST['user_city_id'] ? $_POST['user_city_id'] : 0,
                'name' => $_POST['name'],
                'temperature_stratification' => isset($_POST['temperature_stratification']) && $_POST['temperature_stratification'] ? $_POST['temperature_stratification'] : 0,
                'city_id' => isset($_POST['city_id']) && $_POST['city_id'] ? $_POST['city_id'] : 0,
            ];
            $this->directoryModel->saveUserRegion($userId, $data);
        }

        $regions = $this->directoryModel->getAllUserRegions($userId, true);

        return view('pages.account.directory.regions', compact('regions'));
    }

    public function deleteRegionData(){
        $userId = auth()->user()->id;
        if ($userId == null){
            return redirect('/login');
        }

        if (isset(request()->id) && request()->id != null){
            $cityId = request()->id;

            $this->directoryModel->deleteUserCityData($userId, $cityId);
        }

        return redirect('/account/directory/regions');
    }

    public function deleteCityData(){
        $userId = auth()->user()->id;
        if ($userId == null){
            return redirect('/login');
        }

        if (isset(request()->id) && request()->id != null){
            $cityId = request()->id;

            $this->directoryModel->deleteUserCityData($userId, $cityId);
        }

        return redirect('/account/directory/cities');
    }

    public function resetUserRegionsData(){
        $userId = auth()->user()->id;
        if ($userId == null){
            return redirect('/login');
        }

        $this->directoryModel->resetUserRegionsData($userId);

        return redirect('/account/directory/regions');
    }

    public function resetUserCitiesData(){
        $userId = auth()->user()->id;
        if ($userId == null){
            return redirect('/login');
        }

        $this->directoryModel->resetUserCitiesData($userId);

        return redirect('/account/directory/cities');
    }

    public function regionSearch(){
        $userId = auth()->user()->id;
        if ($userId == null){
            return redirect('/login');
        }

        if (isset($_GET['regionName']) && $_GET['regionName']){
            $regionName = $_GET['regionName'];

            $regions = $this->directoryModel->getUserRegionsByName($userId, $regionName);

            return view('pages.account.directory.regions', compact('regions'));
        }

        return redirect('/account/directory/regions');
    }

    public function citySearch(){
        $userId = auth()->user()->id;
        if ($userId == null){
            return redirect('/login');
        }

        if (isset($_GET['cityName']) && $_GET['cityName']){
            $regionName = $_GET['cityName'];

            $regions = $this->directoryModel->getAllUserRegions($userId, false);

            $tempRegions = [];
            for ($i = 0; $i < count($regions); $i++){
                if ($regions[$i]->city_id == 0) {
                    $tempRegions[$regions[$i]->user_city_id] = $regions[$i];
                } else {
                    $tempRegions[$regions[$i]->city_id] = $regions[$i];
                }
            }
            $regions = $tempRegions;

            $cities= $this->directoryModel->getUserCitiesByName($userId, $regionName);

            return view('pages.account.directory.cities', compact('regions', 'cities'));
        }

        return redirect('/account/directory/cities');
    }

    public function getCities(){
        $userId = auth()->user()->id;
        if ($userId == null){
            return redirect('/login');
        }


        if (isset($_POST['name']) && $_POST['name']) {
            $data = [
                'name' => $_POST['name'],
                'region_id' => $_POST['region_id'],
                'user_city_id' => $_POST['user_city_id'],
                'city_id' => isset($_POST['city_id']) && $_POST['city_id'] ? $_POST['city_id'] : false,
            ];
            $this->directoryModel->saveUserCity($userId, $data);
        }

        $regions = $this->directoryModel->getAllUserRegions($userId, false);

        $tempRegions = [];
        for ($i = 0; $i < count($regions); $i++){
            if ($regions[$i]->city_id == 0) {
                $tempRegions[$regions[$i]->user_city_id] = $regions[$i];
            } else {
                $tempRegions[$regions[$i]->city_id] = $regions[$i];
            }
        }
        $regions = $tempRegions;

        $cities = $this->directoryModel->getAllUserCities($userId);

        return view('pages.account.directory.cities', compact('cities', 'regions'));
    }


    public function getSearchCity(Request $request){
        $userId = auth()->user()->id;
        if ($userId == null){
            return redirect('/login');
        }

        $regionId = $request->filterRegionId;

        if ($regionId == null) {
            return redirect('/account/directory/cities');
        }

        $regions = $this->directoryModel->getAllUserRegions($userId, false);

        $tempRegions = [];
        for ($i = 0; $i < count($regions); $i++){
            if ($regions[$i]->city_id == 0) {
                $tempRegions[$regions[$i]->user_city_id] = $regions[$i];
            } else {
                $tempRegions[$regions[$i]->city_id] = $regions[$i];
            }
        }
        $regions = $tempRegions;

        $cities = $this->directoryModel->getSearchCity($userId, $regionId);

        return view('pages.account.directory.cities', compact('cities', 'regions'));
    }

    public function getCityData(){
        $userId = auth()->user()->id;
        if ($userId == null){
            return redirect('/login');
        }

        $cityId = request()->id;
        $cityData = $this->directoryModel->getUserCityData($userId, $cityId);

        return view('pages.account.directory.city', compact('cityData'));
    }

    public function saveCityWindDirections() {
        $userId = auth()->user()->id;
        if ($userId == null){
            return redirect('/login');
        }

        if (isset($_POST['city_id'])) {
            $newCity = $this->directoryModel->saveCityWindDirections($userId);

            return redirect('/account/directory/city/' . ($newCity ? $newCity : $_POST['user_city_id']));
        }

        return redirect('/account/directory/cities');
    }

    public function saveCityTemperature() {
        $userId = auth()->user()->id;
        if ($userId == null){
            return redirect('/login');
        }

        if (isset($_POST['city_id'])) {
            $cityId = $_POST['city_id'];
            $userCityId = isset($_POST['user_city_id']) && $_POST['user_city_id'] ? $_POST['user_city_id'] : 0;
            $data = [
                'average_wind_speed_AVD' => isset($_POST['average_wind_speed_AVD']) && doubleval($_POST['average_wind_speed_AVD']) ? $_POST['average_wind_speed_AVD'] : 0,
                'average_maximum_air_temperature_WM' => isset($_POST['average_maximum_air_temperature_WM']) && doubleval($_POST['average_maximum_air_temperature_WM']) ? $_POST['average_maximum_air_temperature_WM'] : 0,
                'average_temperature_january' => isset($_POST['average_temperature_january']) && doubleval($_POST['average_temperature_january']) ? $_POST['average_temperature_january'] : 0,
                'average_temperature_february' => isset($_POST['average_temperature_february']) && doubleval($_POST['average_temperature_february']) ? $_POST['average_temperature_february'] : 0,
                'average_temperature_march' => isset($_POST['average_temperature_march']) && doubleval($_POST['average_temperature_march']) ? $_POST['average_temperature_march'] : 0,
                'average_temperature_april' => isset($_POST['average_temperature_april']) && doubleval($_POST['average_temperature_april']) ? $_POST['average_temperature_april'] : 0,
                'average_temperature_may' => isset($_POST['average_temperature_may']) && doubleval($_POST['average_temperature_may']) ? $_POST['average_temperature_may'] : 0,
                'average_temperature_june' => isset($_POST['average_temperature_june']) && doubleval($_POST['average_temperature_june']) ? $_POST['average_temperature_june'] : 0,
                'average_temperature_july' => isset($_POST['average_temperature_july']) && doubleval($_POST['average_temperature_july']) ? $_POST['average_temperature_july'] : 0,
                'average_temperature_august' => isset($_POST['average_temperature_august']) && doubleval($_POST['average_temperature_august']) ? $_POST['average_temperature_august'] : 0,
                'average_temperature_september' => isset($_POST['average_temperature_september']) && doubleval($_POST['average_temperature_september']) ? $_POST['average_temperature_september'] : 0,
                'average_temperature_october' => isset($_POST['average_temperature_october']) && doubleval($_POST['average_temperature_october']) ? $_POST['average_temperature_october'] : 0,
                'average_temperature_november' => isset($_POST['average_temperature_november']) && doubleval($_POST['average_temperature_november']) ? $_POST['average_temperature_november'] : 0,
                'average_temperature_december' => isset($_POST['average_temperature_december']) && doubleval($_POST['average_temperature_december']) ? $_POST['average_temperature_december'] : 0,
            ];

            $newCity = $this->directoryModel->saveCityTemperature($userId, $cityId, $data, $userCityId);

            if ($userCityId) {
                return redirect('/account/directory/city/' . ($newCity ? $newCity : $userCityId));
            }
            return redirect('/account/directory/city/' . ($newCity ? $newCity : $cityId));
        }

        return redirect('/account/directory/cities');
    }

    public function getSOAP(){
        $userId = auth()->user()->id;
        if ($userId == null){
            return redirect('/login');
        }

        try {
            $data = [
                'source_id' => \request()->get('source_id'),
                'name' => \request()->get('name'),
            ];

            $this->directoryModel->saveUserSOAP($userId, $data);
        } catch (\Throwable $exception){

        }

        $sources = $this->directoryModel->getUserSOAP($userId);

        return view('pages.account.directory.sourcesOfAirPollution', compact('sources'));
    }


    public function deleteSOAP(){
        $userId = auth()->user()->id;
        if ($userId == null){
            return redirect('/login');
        }

        if (isset(request()->id) && request()->id != null){
            $sourceId = request()->id;

            $this->directoryModel->deleteUserSOAP($userId, $sourceId);
        }

        return redirect('/account/directory/sourcesOfAirPollution');
    }
}
