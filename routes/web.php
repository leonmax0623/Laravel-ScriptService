<?php

use App\Http\Controllers\Account\DirectoryController;
use App\Http\Controllers\Account\OrganizationController as UserOrganization;
use App\Http\Controllers\Account\SettingsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrganizationController;
use App\Http\Controllers\Admin\PaymentInvoiceController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SanPiN;
use App\Http\Controllers\Admin\SanPiNController;
use App\Http\Controllers\Admin\SourcesOfAirPollutionController;
use App\Http\Controllers\Admin\TariffController;
use App\Http\Controllers\Admin\UsersController as AdminUser;
use App\Http\Controllers\Documentation\ReferencesController;
use App\Http\Controllers\Logs\AuditLogsController;
use App\Http\Controllers\Logs\SystemLogsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Social\GoogleController;
use App\Http\Controllers\Social\VkontakteController;
use App\Http\Controllers\Admin\TemperatureStratificationController;
use App\Http\Controllers\UsersController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Account\ProjectController as UserProject;
use App\Http\Controllers\Account\ObjectController;
use App\Http\Controllers\Admin\ObjectController as AdminObject;
use App\Http\Controllers\Admin\WorkshopController as AdminWorkshop;
use App\Http\Controllers\Admin\BalanceController;
use App\Http\Controllers\Account\CalculationsController;
use App\Http\Controllers\Account\FinancesController;
use App\Http\Controllers\ModuleController;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$menu = theme()->getMenu();
array_walk($menu, function ($val) {
    if (isset($val['path'])) {
        $route = Route::get($val['path'], [PagesController::class, 'index']);

        // Exclude documentation from auth middleware
        if (!Str::contains($val['path'], 'documentation')) {
            $route->middleware('auth');
        }
    }
});

// Documentations pages
Route::prefix('documentation')->group(function () {
    Route::get('getting-started/references', [ReferencesController::class, 'index']);
    Route::get('getting-started/changelog', [PagesController::class, 'index']);
});

//Route::group(['middleware' => ['role:user']], function () {
    Route::middleware('auth')->group(function () {
        // Account pages
        Route::prefix('account')->group(function () {
            Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
            Route::put('settings', [SettingsController::class, 'update'])->name('settings.update');
            Route::get('settings/company', [SettingsController::class, 'getCompanyInfo'])->name('settings.company');
            Route::put('settings/company', [SettingsController::class, 'setCompany'])->name('settings.company');
            Route::put('settings/email', [SettingsController::class, 'changeEmail'])->name('settings.changeEmail');
            Route::put('settings/password', [SettingsController::class, 'changePassword'])->name('settings.changePassword');
            Route::get('organization', [UserOrganization::class, 'getUserOrganizations'])->name('organization.organization');
            Route::put('organization', [UserOrganization::class, 'setOrganization'])->name('organization.organization');
            Route::get('organizationSearch', [UserOrganization::class, 'organizationSearch'])->name('organization.organizationSearch');
            Route::get('deleteOrganization/{id}', [UserOrganization::class, 'deleteOrganization']);
            Route::get('project', [UserProject::class, 'index'])->name('project.index');
            Route::put('createUserProject', [UserProject::class, 'createUserProject'])->name('account.createUserProject');
            Route::get('project/{id}', [UserProject::class, 'projectInfo']);
            Route::get('deletedProject/', [UserProject::class, 'deletedProject']);
            Route::get('deletedObject/', [ObjectController::class, 'deletedObject']);
            Route::get('createObject/{id}', [ObjectController::class, 'getCreateObjectForm']);
            Route::put('createObject/{id}', [ObjectController::class, 'createObject']);
            Route::get('editObject/{id}', [ObjectController::class, 'editObject']);
            Route::put('editObject', [ObjectController::class, 'updateObject']);
            Route::put('updateObject/', [ObjectController::class, 'updateObject'])->name('account.updateObject');
            Route::put('projectUpdate/', [UserProject::class, 'projectUpdate'])->name('account.projectUpdate');
            Route::get('finance/', [FinancesController::class, 'index'])->name('account.finances');
            Route::get('calculations/', [CalculationsController::class, 'index'])->name('account.calculations');
            Route::get('connectModule/', [CalculationsController::class, 'connectModule']);
            Route::get('disconnectModule/', [CalculationsController::class, 'disconnectModule']);
            Route::get('modulePage/{id}', [ModuleController::class, 'modulePage']);
            Route::put('makePaymentInvoice', [FinancesController::class, 'makePaymentInvoice'])->name('finance.makePaymentInvoice');
            Route::get('project/{project_id}/object/{object_id}', [ObjectController::class, 'objectInfo']);
            Route::put('createWorkshop', [ObjectController::class, 'createWorkshop']);
            Route::put('createEmissionSources', [ObjectController::class, 'createEmissionSources']);
            Route::get('deleteEmissionSources/{project_id}/{object_id}/{emission_sources_id}', [ObjectController::class, 'deleteEmissionSources']);
            Route::put('createIsa/', [ObjectController::class, 'createIsa']);
            Route::get('project/{project_id}/object/{object_id}/copyIsa/{isa_id}', [ObjectController::class, 'copyIsa']);
            Route::get('project/{project_id}/object/{object_id}/deleteIsa/{isa_id}', [ObjectController::class, 'deleteIsa']);
            Route::get('project/{project_id}/object/{object_id}/deleteWorkshop/{workshop_id}', [ObjectController::class, 'deleteWorkshop']);
            Route::get('directory/regions', [DirectoryController::class, 'getRegions'])->name('directory.getRegions');
            Route::put('directory/regions', [DirectoryController::class, 'getRegions']);
            Route::get('directory/deleteRegionData/{id}', [DirectoryController::class, 'deleteRegionData']);
            Route::get('directory/regionSearch', [DirectoryController::class, 'regionSearch'])->name('directory.regionSearch');
            Route::get('directory/resetUserRegionsData', [DirectoryController::class, 'resetUserRegionsData']);
            Route::get('directory/cities', [DirectoryController::class, 'getCities'])->name('directory.getCities');
            Route::put('directory/cities', [DirectoryController::class, 'getCities']);
            Route::get('directory/deleteCityData/{id}', [DirectoryController::class, 'deleteCityData']);
            Route::get('directory/citySearch', [DirectoryController::class, 'citySearch'])->name('directory.citySearch');
            Route::get('directory/resetUserCitiesData', [DirectoryController::class, 'resetUserCitiesData']);
            Route::get('directory/cities/search', [DirectoryController::class, 'getSearchCity'])->name('directory.filterSearch');

            Route::get('directory/city/{id}', [DirectoryController::class, 'getCityData'])->name('directory.getCityData');
            Route::put('directory/saveCityWindDirections', [DirectoryController::class, 'saveCityWindDirections'])->name('directory.saveCityWindDirections');
            Route::put('directory/saveCityTemperature', [DirectoryController::class, 'saveCityTemperature'])->name('directory.saveCityTemperature');

            Route::get('directory/sourcesOfAirPollution', [DirectoryController::class, 'getSOAP'])->name('directory.getSOAP');
            Route::put('directory/sourcesOfAirPollution', [DirectoryController::class, 'getSOAP']);
            Route::get('directory/deleteSOAP/{id}', [DirectoryController::class, 'deleteSOAP']);


        });

        // Logs pages
        Route::prefix('log')->name('log.')->group(function () {
            Route::resource('system', SystemLogsController::class)->only(['index', 'destroy']);
            Route::resource('audit', AuditLogsController::class)->only(['index', 'destroy']);
        });
    });
//});

Route::resource('users', UsersController::class);

/**
 * Socialite login using Google service
 * https://laravel.com/docs/8.x/socialite
 */
//Route::get('/auth/redirect/{provider}', [SocialiteLoginController::class, 'redirect']);

Route::prefix('google')->name('google.')->group(function (){
    Route::get('login', [GoogleController::class, 'loginWithGoogle'])->name('login');
    Route::any('callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
});

Route::prefix('vkontakte')->name('vkontakte.')->group(function (){
    Route::get('login', [VkontakteController::class, 'loginWithVkontakte'])->name('login');
    Route::any('callback', [VkontakteController::class, 'callbackFromVkontakte'])->name('callback');
});

require __DIR__.'/auth.php';
// Admin
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('admin', [DashboardController::class, 'index']);
    Route::get('admin/statistics', [DashboardController::class, 'statistics']);
// Cities
    Route::get('admin/cities', [DashboardController::class, 'getCities'])->name('admin.getCities');
    Route::put('admin/cities', [DashboardController::class, 'getCities'])->name('admin.putCities');
    Route::get('admin/deleteCityData/{id}', [DashboardController::class, 'deleteCityData']);
    Route::get('admin/citySearch', [DashboardController::class, 'citySearch'])->name('admin.citySearch');
// Users
    Route::get('admin/project', [ProjectController::class, 'index'])->name('admin.project');
    Route::get('admin/users', [AdminUser::class, 'index'],[DashboardController::class, 'getCities'])->name('admin.users');
    Route::get('admin/users/search', [AdminUser::class, 'getSearchUser'])->name('admin.userSearch');

    Route::get('admin/users/{id}', [AdminUser::class, 'getUserInfo'])->name('admin.userPage');
    Route::get('admin/deleteUser/{id}', [AdminUser::class, 'deleteUser']);
    Route::get('admin/blockUser/{id}', [AdminUser::class, 'blockUser']);
    Route::get('admin/activeUser/{id}', [AdminUser::class, 'activeUser']);
    Route::post('admin/updateUserProfile/', [AdminUser::class, 'updateUserProfile']);

    Route::get('admin/organization', [OrganizationController::class, 'index'])->name('admin.organization');
    Route::put('admin/organization', [OrganizationController::class, 'setOrganization'])->name('admin.organization');
    Route::get('admin/organizationSearch', [OrganizationController::class, 'organizationSearch'])->name('admin.organizationSearch');
    Route::get('admin/deleteOrganization/{id}', [OrganizationController::class, 'deleteOrganization']);
    Route::get('admin/userOrganization/{id}', [AdminUser::class, 'getUserOrganizations'])->name('admin.userOrganization');
    Route::put('admin/createUserOrganization', [AdminUser::class, 'setUserOrganization'])->name('admin.createUserOrganization');
    Route::put('admin/createUserProject', [AdminUser::class, 'createUserProject'])->name('admin.createUserProject');
    Route::get('admin/deleteProject/{id}', [AdminUser::class, 'deleteProject']);
    Route::put('admin/createUser', [AdminUser::class, 'createUser'])->name('admin.createUser');
    Route::get('admin/user/setrole/{userId}/{role}', [AdminUser::class, 'setrole']);
    Route::get('admin/logout', [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
    Route::get('admin/object', [AdminObject::class, 'index'])->name('admin.object');
    Route::get('admin/deletedObject/', [AdminObject::class, 'deletedObject']);
    Route::get('admin/editObject/{id}', [AdminObject::class, 'editObject']);
    Route::put('admin/editObject', [AdminObject::class, 'updateObject']);
    Route::get('admin/userBalance/{id}', [AdminUser::class, 'userBalance']);
    Route::put('admin/topUpUserAccount/', [AdminUser::class, 'topUpUserAccount'])->name('admin.topUpUserAccount');
    Route::put('admin/updateModule/', [ModuleController::class, 'updateModule'])->name('admin.updateModule');
    Route::get('admin/moduleList/', [ModuleController::class, 'getModuleList'])->name('admin.module');

    Route::get('admin/paymentInvoice', [PaymentInvoiceController::class, 'getPaymentInvoice'])->name('admin.getPaymentInvoice');
    Route::get('admin/deletePayment', [PaymentInvoiceController::class, 'deletePayment']);
    Route::get('admin/confirmPayment', [PaymentInvoiceController::class, 'confirmPayment']);

});



