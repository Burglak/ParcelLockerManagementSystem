<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParcelLockerController;
use App\Http\Controllers\ParcelsController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\IsCourier;
use App\Http\Controllers\CourierController as CourierControl;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\CourierController;
use App\Http\Controllers\Admin\CourierZoneController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ParcelLockerController as AdminParcelLockerController;
use App\Http\Controllers\Admin\PackageStatusController;
use App\Http\Controllers\Admin\PackageTypeController;
use App\Http\Controllers\Admin\TransactionController;



Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/parcel-details' , function () {
    return view('parcel-details');
})->name('parcel-details');


Route::get("/for-companies", function () {
    return view('for-companies');
})->name('for-companies');

Route::get('/parcel-lockers', [ParcelLockerController::class, 'index'])->name('parcel-lockers');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('profile/add-company', [ProfileController::class, 'createCompany'])->name('profile.create-company');
    Route::post('profile/add-company', [ProfileController::class, 'storeCompany'])->name('profile.store-company');
    Route::get('/my-packages', [ParcelsController::class, 'index'])->name('my-packages');
    Route::get('/sent-packages', [ParcelsController::class, 'sent'])->name('sent-packages');
    Route::get('/send', [ParcelsController::class, 'create'])->name('send.create');
    Route::post('/send', [ParcelsController::class, 'store'])->name('send');
});

Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard')->middleware(AdminMiddleware::class);
Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users')->middleware(AdminMiddleware::class);
Route::get('/admin/cities', [CityController::class, 'index'])->name('admin.cities')->middleware(AdminMiddleware::class);
Route::get('/admin/companies', [CompanyController::class, 'index'])->name('admin.companies')->middleware(AdminMiddleware::class);
Route::get('/admin/couriers', [CourierController::class, 'index'])->name('admin.couriers')->middleware(AdminMiddleware::class);
Route::get('/admin/courier-zones', [CourierZoneController::class, 'index'])->name('admin.courier-zones')->middleware(AdminMiddleware::class);
Route::get('/admin/packages', [PackageController::class, 'index'])->name('admin.packages')->middleware(AdminMiddleware::class);
Route::get('/admin/parcel-lockers', [AdminParcelLockerController::class, 'index'])->name('admin.parcel-lockers')->middleware(AdminMiddleware::class);
Route::get('/admin/package-statuses', [PackageStatusController::class, 'index'])->name('admin.package-statuses')->middleware(AdminMiddleware::class);
Route::get('/admin/package-types', [PackageTypeController::class, 'index'])->name('admin.package-types')->middleware(AdminMiddleware::class);
Route::get('/admin/transactions', [TransactionController::class, 'index'])->name('admin.transactions')->middleware(AdminMiddleware::class);

Route::delete('/admin/delete-user/{id}', [AdminController::class, 'deleteUser'])->name('admin.delete-user')->middleware(AdminMiddleware::class);
Route::get('/admin/edit-user/{id}', [AdminController::class, 'editUser'])->name('admin.edit-user');
Route::patch('/admin/update-user/{id}', [AdminController::class, 'updateUser'])->name('admin.update-user')->middleware(AdminMiddleware::class);

Route::get('/admin/cities/{id}/edit', [CityController::class, 'edit'])->name('admin.edit-city')->middleware(AdminMiddleware::class);
Route::patch('/admin/cities/{id}', [CityController::class, 'update'])->name('admin.update-city')->middleware(AdminMiddleware::class);
Route::delete('/admin/cities/{id}', [CityController::class, 'destroy'])->name('admin.delete-city')->middleware(AdminMiddleware::class);
Route::get('/admin/cities/create', [CityController::class, 'create'])->name('admin.create-city')->middleware(AdminMiddleware::class);
Route::post('/admin/cities', [CityController::class, 'store'])->name('admin.store-city')->middleware(AdminMiddleware::class);

Route::get('/admin/companies', [CompanyController::class, 'index'])->name('admin.companies')->middleware(AdminMiddleware::class);
Route::get('/admin/companies/create', [CompanyController::class, 'create'])->name('admin.create-company')->middleware(AdminMiddleware::class);
Route::post('/admin/companies', [CompanyController::class, 'store'])->name('admin.store-company')->middleware(AdminMiddleware::class);
Route::get('/admin/companies/{id}/edit', [CompanyController::class, 'edit'])->name('admin.edit-company')->middleware(AdminMiddleware::class);
Route::patch('/admin/companies/{id}', [CompanyController::class, 'update'])->name('admin.update-company')->middleware(AdminMiddleware::class);
Route::delete('/admin/companies/{id}', [CompanyController::class, 'destroy'])->name('admin.delete-company')->middleware(AdminMiddleware::class);

Route::get('/courier-zones', [CourierZoneController::class, 'index'])->name('admin.courier-zones.index')->middleware(AdminMiddleware::class);
Route::get('/courier-zones/create', [CourierZoneController::class, 'create'])->name('admin.create-courier-zone')->middleware(AdminMiddleware::class);
Route::post('/courier-zones', [CourierZoneController::class, 'store'])->name('admin.store-courier-zone')->middleware(AdminMiddleware::class);
Route::get('/courier-zones/{id}/edit', [CourierZoneController::class, 'edit'])->name('admin.edit-courier-zone')->middleware(AdminMiddleware::class);
Route::patch('/courier-zones/{id}', [CourierZoneController::class, 'update'])->name('admin.update-courier-zone')->middleware(AdminMiddleware::class);
Route::delete('/courier-zones/{id}', [CourierZoneController::class, 'destroy'])->name('admin.delete-courier-zone')->middleware(AdminMiddleware::class);

Route::get('/package-types', [PackageTypeController::class, 'index'])->name('admin.package-types.index')->middleware(AdminMiddleware::class);
Route::get('/package-types/create', [PackageTypeController::class, 'create'])->name('admin.create-package-type')->middleware(AdminMiddleware::class);
Route::post('/package-types', [PackageTypeController::class, 'store'])->name('admin.store-package-type')->middleware(AdminMiddleware::class);
Route::get('/package-types/{id}/edit', [PackageTypeController::class, 'edit'])->name('admin.edit-package-type')->middleware(AdminMiddleware::class);
Route::patch('/package-types/{id}', [PackageTypeController::class, 'update'])->name('admin.update-package-type')->middleware(AdminMiddleware::class);
Route::delete('/package-types/{id}', [PackageTypeController::class, 'destroy'])->name('admin.delete-package-type')->middleware(AdminMiddleware::class);

Route::get('/admin/packages', [PackageController::class, 'index'])->name('admin.packages')->middleware(AdminMiddleware::class);
Route::get('/admin/packages/create', [PackageController::class, 'create'])->name('admin.create-package')->middleware(AdminMiddleware::class);
Route::post('/admin/packages', [PackageController::class, 'store'])->name('admin.store-package')->middleware(AdminMiddleware::class);
Route::get('/admin/packages/{id}/edit', [PackageController::class, 'edit'])->name('admin.edit-package')->middleware(AdminMiddleware::class);
Route::patch('/admin/packages/{id}', [PackageController::class, 'update'])->name('admin.update-package')->middleware(AdminMiddleware::class);
Route::delete('/admin/packages/{id}', [PackageController::class, 'destroy'])->name('admin.delete-package')->middleware(AdminMiddleware::class);

Route::get('/admin/package-statuses', [PackageStatusController::class, 'index'])->name('admin.package-statuses')->middleware(AdminMiddleware::class);
Route::get('/admin/package-statuses/create', [PackageStatusController::class, 'create'])->name('admin.create-package-status')->middleware(AdminMiddleware::class);
Route::post('/admin/package-statuses', [PackageStatusController::class, 'store'])->name('admin.store-package-status')->middleware(AdminMiddleware::class);
Route::get('/admin/package-statuses/{id}/edit', [PackageStatusController::class, 'edit'])->name('admin.edit-package-status')->middleware(AdminMiddleware::class);
Route::patch('/admin/package-statuses/{id}', [PackageStatusController::class, 'update'])->name('admin.update-package-status')->middleware(AdminMiddleware::class);
Route::delete('/admin/package-statuses/{id}', [PackageStatusController::class, 'destroy'])->name('admin.delete-package-status')->middleware(AdminMiddleware::class);

Route::get('/admin/parcel-lockers', [AdminParcelLockerController::class, 'index'])->name('admin.parcel-lockers')->middleware(AdminMiddleware::class);
Route::get('/admin/parcel-lockers/create', [AdminParcelLockerController::class, 'create'])->name('admin.create-parcel-locker')->middleware(AdminMiddleware::class);
Route::post('/admin/parcel-lockers', [AdminParcelLockerController::class, 'store'])->name('admin.store-parcel-locker')->middleware(AdminMiddleware::class);
Route::get('/admin/parcel-lockers/{id}/edit', [AdminParcelLockerController::class, 'edit'])->name('admin.edit-parcel-locker')->middleware(AdminMiddleware::class);
Route::patch('/admin/parcel-lockers/{id}', [AdminParcelLockerController::class, 'update'])->name('admin.update-parcel-locker')->middleware(AdminMiddleware::class);
Route::delete('/admin/parcel-lockers/{id}', [AdminParcelLockerController::class, 'destroy'])->name('admin.delete-parcel-locker')->middleware(AdminMiddleware::class);

Route::get('couriers', [CourierController::class, 'index'])->name('admin.couriers')->middleware(AdminMiddleware::class);
Route::get('couriers/create', [CourierController::class, 'create'])->name('admin.create-courier')->middleware(AdminMiddleware::class);
Route::post('couriers', [CourierController::class, 'store'])->name('admin.store-courier')->middleware(AdminMiddleware::class);
Route::get('couriers/{id}/edit', [CourierController::class, 'edit'])->name('admin.edit-courier')->middleware(AdminMiddleware::class);
Route::patch('couriers/{id}', [CourierController::class, 'update'])->name('admin.update-courier')->middleware(AdminMiddleware::class);
Route::delete('couriers/{id}', [CourierController::class, 'destroy'])->name('admin.delete-courier')->middleware(AdminMiddleware::class);

Route::get('/courier', [CourierControl::class, 'index'])->name('courier.parcels')->middleware(IsCourier::class);
Route::post('/courier/update', [CourierControl::class, 'updateParcels'])->name('courier.updateParcels')->middleware(IsCourier::class);

require __DIR__.'/auth.php';
