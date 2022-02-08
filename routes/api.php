<?php

use App\Http\Controllers\Account\OrganizationController;
use App\Http\Controllers\Admin\OrganizationController as AdminOrganuzation;
use App\Http\Controllers\Admin\SourcesOfAirPollutionController;
use App\Http\Controllers\Admin\TemperatureStratificationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Account\ObjectController;
use App\Http\Controllers\Account\ProjectController as UserProject;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

// Sample API route
Route::get('/profits', [\App\Http\Controllers\SampleDataController::class, 'profits'])->name('profits');
Route::get('/getInnInfo', [\App\Http\Controllers\Api\INNContrloller::class, 'getINNInfo'])->name('getINNInfo');
Route::get('/issetObjectName', [ObjectController::class, 'issetObjectName']);
Route::get('/issetProjectName', [UserProject::class, 'issetProjectName']);
Route::get('/issetTTSName', [TemperatureStratificationController::class, 'issetTTSName']);
Route::get('/issetSOAPName', [SourcesOfAirPollutionController::class, 'issetSOAPName']);
Route::get('/issetAdminUserOrganization', [AdminOrganuzation::class, 'issetUserOrganization']);
Route::get('/issetUserOrganization', [OrganizationController::class, 'issetUserOrganization']);
Route::get('/getEmissionSources', [ObjectController::class, 'getEmissionSources']);
Route::get('/getIsaObject', [ObjectController::class, 'getIsaObject']);

