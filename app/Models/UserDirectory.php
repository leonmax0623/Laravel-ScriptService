<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class UserDirectory extends Model
{
    use HasFactory;

    public function getUserSOAP($userId){
        $sql = "select
               	s.name,
				0 as user_id,
				s.source_id
                from sources_of_air_pollution s
                union
                select us.name, us.user_id, us.source_id from user_sources_of_air_pollution us
                where us.user_id = " . $userId . "
                order by name";
        $res = DB::select($sql);

        $collect = collect($res);

        $page = isset($_GET['page']) && $_GET['page'] ? $_GET['page'] : 1;
        $perPage = 40;

        $paginationData = new LengthAwarePaginator(
            $collect->forPage($page, $perPage),
            $collect->count(),
            $perPage,
            $page
        );

        $paginationData->setPath('/account/directory/sourcesOfAirPollution');

        return $paginationData;
    }

    public function saveUserSOAP($userId, $data){
        if ($data) {
            if (isset($data['source_id']) && $data['source_id'] != null) {
                DB::table('user_sources_of_air_pollution')
                    ->where([['user_id', $userId], ['source_id', $data['source_id']]])
                    ->update([
                        'name' => $data['name'],
                        'updated_at' => Carbon::now(),
                    ]);
            } else {
                DB::table('user_sources_of_air_pollution')->insert([
                    'user_id' => $userId,
                    'name' => $data['name'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }

    public function getUserRegionsByName($userId, $regionName){
        $sql = "select
               	if (uc2.name is not null, uc2.name, c.name) as name,
				if (uc2.temperature_stratification is not null, uc2.temperature_stratification, c.temperature_stratification) as temperature_stratification,
				if (uc2.city_id is not null, uc2.city_id, c.city_id) as city_id,
				if (uc2.user_city_id is not null, uc2.user_city_id, 0) as user_city_id
                from cities c
				left join user_cities uc2 on uc2.city_id = c.city_id and uc2.user_id = " . $userId . "
                where c.is_region = 1 and c.name like '%" . $regionName . "%'
                union
                select uc.name, uc.temperature_stratification, uc.city_id, uc.user_city_id from user_cities uc
                where uc.name like '%" . $regionName . "%' and not exists (select 1 from cities c1 where c1.name = uc.name and c1.name like '%" . $regionName . "%') and uc.user_id = " . $userId . " and uc.is_region = 1
                order by name";
        $res = DB::select($sql);
        $collect = collect($res);

        $page = isset($_GET['page']) && $_GET['page'] ? $_GET['page'] : 1;
        $perPage = 40;

        $paginationData = new LengthAwarePaginator(
            $collect->forPage($page, $perPage),
            $collect->count(),
            $perPage,
            $page
        );

        $paginationData->setPath('/account/directory/regions');

        return $paginationData;
    }

    public function getAllUserRegions($userId, $paginate = true)
    {
        $sql = "select
       			if (uc2.name is not null, uc2.name, c.name) as name,
				if (uc2.temperature_stratification is not null, uc2.temperature_stratification, c.temperature_stratification) as temperature_stratification,
				if (uc2.city_id is not null, uc2.city_id, c.city_id) as city_id,
				if (uc2.user_city_id is not null, uc2.user_city_id, 0) as user_city_id
                from cities c
				left join user_cities uc2 on uc2.city_id = c.city_id and uc2.user_id = " . $userId . "
                where c.is_region = 1
                union
                select uc.name, uc.temperature_stratification, uc.city_id, uc.user_city_id from user_cities uc
                where not exists (select 1 from cities c1 where c1.name = uc.name) and uc.user_id = " . $userId . " and uc.is_region = 1
                order by name";

        $res = DB::select($sql);
        if ($paginate) {
            $collect = collect($res);

            $page = isset($_GET['page']) && $_GET['page'] ? $_GET['page'] : 1;
            $perPage = 40;

            $paginationData = new LengthAwarePaginator(
                $collect->forPage($page, $perPage),
                $collect->count(),
                $perPage,
                $page
            );

            $paginationData->setPath('/account/directory/regions');

            return $paginationData;
        }

        return $res;
    }

    public function saveUserRegion($userId, $data){
        if ($userId && $data) {
            if (isset($data['user_city_id']) && $data['user_city_id']){
                DB::table('user_cities')
                    ->where([['user_city_id', $data['user_city_id']], ['user_id', $userId]])
                    ->update([
                        'name' => $data['name'],
                        'city_id' => $data['city_id'],
                        'temperature_stratification' => $data['temperature_stratification'],
                        'date_update' => date('Y-m-d H:i:s'),
                    ]);

                return;
            }

            $res = DB::table('user_cities')
                ->where([['name', $data['name']], ['user_id', $userId]])
                ->first();

            if ($res == null) {
                DB::table('user_cities')->insert([
                    'name' => $data['name'],
                    'city_id' => $data['city_id'],
                    'user_id' => $userId,
                    'temperature_stratification' => $data['temperature_stratification'],
                    'is_region' => 1,
                ]);
            } else {
                DB::table('user_cities')
                    ->where([['name', $data['name']], ['user_id', $userId]])
                    ->update([
                        'temperature_stratification' => $data['temperature_stratification'],
                        'city_id' => $data['city_id'],
                        'user_id' => $userId,
                        'date_update' => date('Y-m-d H:i:s'),
                    ]);
            }
        }
    }

    public function deleteUserCityData($userId, $cityId){
        DB::table('user_cities')
            ->where([['user_city_id', $cityId], ['user_id', $userId]])
            ->delete();
    }

    public function resetUserRegionsData($userId){
        $sql = 'SELECT c.city_id, uc.user_city_id, c.name as cityName, uc.name as userCityName FROM user_cities uc
                LEFT JOIN cities c ON c.city_id = uc.city_id
                WHERE uc.is_region = 1 AND uc.city_id > 0 AND uc.user_id = ' . $userId;
        $regions = DB::select($sql);

        foreach ($regions as $region){
            DB::table('user_cities')
                ->where([['user_id', '=', $userId], ['is_region', '=', 0], ['region_id', $region->user_city_id]])
                ->update(['region_id' => $region->city_id]);
        }

        DB::table('user_cities')
            ->where([['user_id', '=', $userId], ['city_id', '!=', 0], ['is_region', '=', 1]])
            ->delete();
    }

    public function getUserCitiesByName($userId, $cityName){
        $sql = "select
               	if (uc2.name is not null, uc2.name, c.name) as name,
				if (uc2.region_id is not null, uc2.region_id, c.region_id) as region_id,
				if (uc2.city_id is not null, uc2.city_id, c.city_id) as city_id,
				if (uc2.user_city_id is not null, uc2.user_city_id, 0) as user_city_id
                from cities c
				left join user_cities uc2 on uc2.city_id = c.city_id and uc2.user_id = " . $userId . "
                where c.is_region = 0 and c.name like '%" . $cityName . "%'
                union
                select uc.name, uc.city_id, uc.region_id, uc.user_city_id from user_cities uc
                where uc.name like '%" . $cityName . "%' and not exists (select 1 from cities c1 where c1.name = uc.name and c1.name like '%" . $cityName . "%') and uc.user_id = " . $userId . " and uc.is_region = 0
                order by name";
        $res = DB::select($sql);
        $collect = collect($res);

        $page = isset($_GET['page']) && $_GET['page'] ? $_GET['page'] : 1;
        $perPage = 40;

        $paginationData = new LengthAwarePaginator(
            $collect->forPage($page, $perPage),
            $collect->count(),
            $perPage,
            $page
        );

        $paginationData->setPath('/account/directory/cities');

        return $paginationData;
    }

    public function getAllUserCities($userId)
    {
        $sql = "select
       			if (uc2.name is not null, uc2.name, c.name) as name,
				if (uc2.city_id is not null, uc2.city_id, c.city_id) as city_id,
				if (uc2.region_id is not null, uc2.region_id, c.region_id) as region_id,
				if (uc2.user_city_id is not null, uc2.user_city_id, 0) as user_city_id
                from cities c
				left join user_cities uc2 on uc2.city_id = c.city_id and uc2.user_id = " . $userId . "
                where c.is_region = 0
                union
                select uc.name, uc.city_id, uc.region_id, uc.user_city_id from user_cities uc
                where not exists (select 1 from cities c1 where c1.name = uc.name) and uc.user_id = " . $userId . " and uc.is_region = 0
                order by name";

        $res = DB::select($sql);
        $collect = collect($res);

        $page = isset($_GET['page']) && $_GET['page'] ? $_GET['page'] : 1;
        $perPage = 40;

        $paginationData = new LengthAwarePaginator(
            $collect->forPage($page, $perPage),
            $collect->count(),
            $perPage,
            $page
        );

        $paginationData->setPath('/account/directory/cities');

        return $paginationData;
    }

    public function getSearchCity($userId, $regionId)
    {
        $sql = "select
       			if (uc2.name is not null, uc2.name, c.name) as name,
				if (uc2.city_id is not null, uc2.city_id, c.city_id) as city_id,
				if (uc2.region_id is not null, uc2.region_id, c.region_id) as region_id,
				if (uc2.user_city_id is not null, uc2.user_city_id, 0) as user_city_id
                from cities c
				left join user_cities uc2 on uc2.city_id = c.city_id and uc2.user_id = " . $userId . "
                where c.is_region = 0 and (uc2.region_id = " . $regionId . " or c.region_id = " . $regionId . ")
                union
                select uc.name, uc.city_id, uc.region_id, uc.user_city_id from user_cities uc
                where not exists (select 1 from cities c1 where c1.name = uc.name) and uc.user_id = " . $userId . " and uc.is_region = 0 and uc.region_id = " . $regionId . "
                order by name";

        $res = DB::select($sql);
        $collect = collect($res);

        $page = isset($_GET['page']) && $_GET['page'] ? $_GET['page'] : 1;
        $perPage = 40;

        $paginationData = new LengthAwarePaginator(
            $collect->forPage($page, $perPage),
            $collect->count(),
            $perPage,
            $page
        );

        $paginationData->setPath('/account/directory/cities');

        return $paginationData;
    }

    public function saveUserCity($userId, $data){
        if ($userId && $data) {
            if (isset($data['user_city_id']) && $data['user_city_id']){
                DB::table('user_cities')
                    ->where([['user_city_id', $data['user_city_id']], ['user_id', $userId]])
                    ->update([
                        'name' => $data['name'],
                        'city_id' => $data['city_id'],
                        'region_id' => $data['region_id'],
                        'date_update' => date('Y-m-d H:i:s'),
                    ]);

                return;
            }

            $res = DB::table('user_cities')
                ->where([['name', $data['name']], ['user_id', $userId]])
                ->first();

            if ($res == null) {
                DB::table('user_cities')->insert([
                    'name' => $data['name'],
                    'city_id' => $data['city_id'],
                    'region_id' => $data['region_id'],
                    'user_id' => $userId,
                    'is_region' => 0,
                ]);
            } else {
                DB::table('user_cities')
                    ->where([['name', $data['name']], ['user_id', $userId]])
                    ->update([
                        'city_id' => $data['city_id'],
                        'region_id' => $data['region_id'],
                        'user_id' => $userId,
                        'is_region' => 0,
                        'date_update' => date('Y-m-d H:i:s'),
                    ]);
            }
        }
    }

    public function resetUserCitiesData($userId){
        DB::table('user_cities')
            ->where([['user_id', '=', $userId], ['city_id', '!=', 0], ['is_region', '=', 0]])
            ->delete();
    }

    public function getUserCityData($userId, $cityId){
        $city = DB::table('user_cities')->select()->where([['user_city_id', $cityId], ['user_id', $userId]])->get()->first();

        if ($city == null) {
            return DB::table('cities')->select()->where('city_id', $cityId)->get()->first();
        }

        return $city;
    }

    public function saveCityWindDirections($userId){
        if (isset($_POST['city_id'])) {
            $cityDirection = $_POST;
            $cityId = $cityDirection['city_id'];
            $userCityId = isset($_POST['user_city_id']) && $_POST['user_city_id'] ? $_POST['user_city_id'] : 0;

            unset($cityDirection['city_id']);
            unset($cityDirection['_token']);
            unset($cityDirection['_method']);

            if (isset($cityDirection['_token'])) {
                unset($cityDirection['_token']);
            }

            if (isset($cityDirection['_method'])) {
                unset($cityDirection['_method']);
            }

            if (count($cityDirection) > 0) {
                $city = DB::table('user_cities')
                    ->where([['user_city_id', $userCityId], ['user_id', $userId]])
                    ->get()
                    ->first();

                if ($city == null){
                    $city = DB::table('cities')
                        ->where('city_id', $cityId)
                        ->get()
                        ->first();

                    $cityId = DB::table('user_cities')
                        ->insertGetId([
                            'name' => $city->name,
                            'city_id' => $city->city_id,
                            'user_id' => $userId,
                            'is_region' => 0,
                            'region_id' => $city->region_id,
                            'average_wind_speed_AVD' => $city->average_wind_speed_AVD,
                            'average_maximum_air_temperature_WM' => $city->average_maximum_air_temperature_WM,
                            'average_temperature_january' => $city->average_temperature_january,
                            'average_temperature_february' => $city->average_temperature_february,
                            'average_temperature_march' => $city->average_temperature_march,
                            'average_temperature_april' => $city->average_temperature_april,
                            'average_temperature_may' => $city->average_temperature_may,
                            'average_temperature_june' => $city->average_temperature_june,
                            'average_temperature_july' => $city->average_temperature_july,
                            'average_temperature_august' => $city->average_temperature_august,
                            'average_temperature_september' => $city->average_temperature_september,
                            'average_temperature_october' => $city->average_temperature_october,
                            'average_temperature_november' => $city->average_temperature_november,
                            'average_temperature_december' => $city->average_temperature_december,
                            'wind_direction_winter_N' => $cityDirection['wind_direction_winter_N'],
                            'wind_direction_winter_NE' => $cityDirection['wind_direction_winter_NE'],
                            'wind_direction_winter_E' => $cityDirection['wind_direction_winter_E'],
                            'wind_direction_winter_SE' => $cityDirection['wind_direction_winter_SE'],
                            'wind_direction_winter_S' => $cityDirection['wind_direction_winter_S'],
                            'wind_direction_winter_SW' => $cityDirection['wind_direction_winter_SW'],
                            'wind_direction_winter_W' => $cityDirection['wind_direction_winter_W'],
                            'wind_direction_winter_NW' => $cityDirection['wind_direction_winter_NW'],
                            'wind_direction_winter_calm' => $cityDirection['wind_direction_winter_calm'],
                            'wind_direction_summer_N' => $cityDirection['wind_direction_summer_N'],
                            'wind_direction_summer_NE' => $cityDirection['wind_direction_summer_NE'],
                            'wind_direction_summer_E' => $cityDirection['wind_direction_summer_E'],
                            'wind_direction_summer_SE' => $cityDirection['wind_direction_summer_SE'],
                            'wind_direction_summer_S' => $cityDirection['wind_direction_summer_S'],
                            'wind_direction_summer_SW' => $cityDirection['wind_direction_summer_SW'],
                            'wind_direction_summer_W' => $cityDirection['wind_direction_summer_W'],
                            'wind_direction_summer_NW' => $cityDirection['wind_direction_summer_NW'],
                            'wind_direction_summer_calm' => $cityDirection['wind_direction_summer_calm'],
                    ]);

                    return $cityId;
                } else {
                    DB::table('user_cities')
                        ->where([['user_city_id', $userCityId], ['user_id', $userId]])
                        ->update(
                            $cityDirection
                        );
                }
            }
        }

        return false;
    }

    public function saveCityTemperature($userId, $cityId, $data, $userCityId){
        if ($userId && $data){

            $city = null;
            if ($userCityId) {
                $city = DB::table('user_cities')
                    ->where([['user_city_id', $userCityId], ['user_id', $userId]])
                    ->get()
                    ->first();
            }

            if ($city == null){
                $city = DB::table('cities')
                    ->where('city_id', $cityId)
                    ->get()
                    ->first();

                $cityId = DB::table('user_cities')
                    ->insertGetId([
                        'name' => $city->name,
                        'city_id' => $city->city_id,
                        'is_region' => 0,
                        'user_id' => $userId,
                        'region_id' => $city->region_id,
                        'wind_direction_winter_N' => $city->wind_direction_winter_N,
                        'wind_direction_winter_NE' => $city->wind_direction_winter_NE,
                        'wind_direction_winter_E' => $city->wind_direction_winter_E,
                        'wind_direction_winter_SE' => $city->wind_direction_winter_SE,
                        'wind_direction_winter_S' => $city->wind_direction_winter_S,
                        'wind_direction_winter_SW' => $city->wind_direction_winter_SW,
                        'wind_direction_winter_W' => $city->wind_direction_winter_W,
                        'wind_direction_winter_NW' => $city->wind_direction_winter_NW,
                        'wind_direction_winter_calm' => $city->wind_direction_winter_calm,
                        'wind_direction_summer_N' => $city->wind_direction_summer_N,
                        'wind_direction_summer_NE' => $city->wind_direction_summer_NE,
                        'wind_direction_summer_E' => $city->wind_direction_summer_E,
                        'wind_direction_summer_SE' => $city->wind_direction_summer_SE,
                        'wind_direction_summer_S' => $city->wind_direction_summer_S,
                        'wind_direction_summer_SW' => $city->wind_direction_summer_SW,
                        'wind_direction_summer_W' => $city->wind_direction_summer_W,
                        'wind_direction_summer_NW' => $city->wind_direction_summer_NW,
                        'wind_direction_summer_calm' => $city->wind_direction_summer_calm,
                        'average_wind_speed_AVD' => $data['average_wind_speed_AVD'],
                        'average_maximum_air_temperature_WM' => $data['average_maximum_air_temperature_WM'],
                        'average_temperature_january' => $data['average_temperature_january'],
                        'average_temperature_february' => $data['average_temperature_february'],
                        'average_temperature_march' => $data['average_temperature_march'],
                        'average_temperature_april' => $data['average_temperature_april'],
                        'average_temperature_may' => $data['average_temperature_may'],
                        'average_temperature_june' => $data['average_temperature_june'],
                        'average_temperature_july' => $data['average_temperature_july'],
                        'average_temperature_august' => $data['average_temperature_august'],
                        'average_temperature_september' => $data['average_temperature_september'],
                        'average_temperature_october' => $data['average_temperature_october'],
                        'average_temperature_november' => $data['average_temperature_november'],
                        'average_temperature_december' => $data['average_temperature_december'],
                    ]);

                return $cityId;
            } else {
                DB::table('user_cities')
                    ->where([['user_city_id', $userCityId], ['user_id', $userId]])
                    ->update(
                        $data
                    );
            }
        }

        return false;
    }

    public function deleteUserSOAP($userId, $sourceId){
        DB::table('user_sources_of_air_pollution')
            ->where([['user_id', $userId], ['source_id', $sourceId]])
            ->delete();
    }
}
