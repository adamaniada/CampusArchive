<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UniversiteController;
use App\Http\Controllers\UfrController;
use App\Http\Controllers\FiliereController;

use App\Http\Controllers\ExamenController;
use App\Http\Controllers\CorrectionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\LogoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['throttle:60, 1'])->group(function () {
    Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
});

Auth::routes();

Route::middleware(['throttle:60, 1', 'auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::middleware(['throttle:60, 1', 'auth'])->group(function () {
    Route::get('/univ', [UniversiteController::class, 'index'])->name('univ');
    Route::get('/univ/create', [UniversiteController::class, 'create'])->name('univ-create');
    Route::post('/store-univ-data', [UniversiteController::class, 'store'])->name('store-univ-data');
    Route::get('/univ/edit/{id}', [UniversiteController::class, 'edit'])->name('univ-edit');
    Route::post('/update-univ-data/{id}', [UniversiteController::class, 'update'])->name('update-univ-data');
    Route::get('/destroy-univ-data/{id}', [UniversiteController::class, 'destroy'])->name('destroy-univ-data');

    Route::get('/{univ_designation}/ufr', [UniversiteController::class, 'show'])->name('show-univ');

    Route::get('/{univ_designation}/ufr/create/', [UfrController::class, 'create'])->name('univ-ufr-create');
    Route::post('/{univ_designation}/ufr/store/{univ_id}/', [UfrController::class, 'store'])->name('univ-ufr-store');
    Route::get('/{univ_designation}/ufr-{ufr_designation}/edit/', [UfrController::class, 'edit'])->name('univ-ufr-edit');
    Route::post('/{univ_designation}/ufr-{ufr_designation}/update/', [UfrController::class, 'update'])->name('univ-ufr-update');
    Route::get('/{univ_designation}/ufr-{ufr_designation}/destroy/', [UfrController::class, 'destroy'])->name('univ-ufr-destroy');

    Route::get('/{univ_designation}/ufr-{ufr_designation}/filiere/', [UfrController::class, 'show'])->name('show-univ-ufr');

    Route::get('/{univ_designation}/ufr-{ufr_designation}/filiere/create', [FiliereController::class, 'create'])->name('form-create-filiere');
    Route::post('/{univ_designation}/ufr-{ufr_designation}/filiere/store', [FiliereController::class, 'store'])->name('store-filiere-data');
    Route::get('/{univ_designation}/ufr-{ufr_designation}/filiere-{filiere_desigination}/edit', [FiliereController::class, 'edit'])->name('form-edit-filiere');
    Route::post('/{univ_designation}/ufr-{ufr_designation}/filiere-{filiere_desigination}/update', [FiliereController::class, 'update'])->name('update-filiere-data');
    Route::get('/{univ_designation}/ufr-{ufr_designation}/filiere-{filiere_desigination}/destroy', [FiliereController::class, 'destroy'])->name('destroy-filiere-data');
});

Route::middleware(['throttle:60, 1', 'auth'])->group(function () {
    Route::get('/examen', [ExamenController::class, 'index'])->name('examen');
    Route::get('/examen/{designation_univ}/ufr-{designation_ufr}/{designation_filiere}', [ExamenController::class, 'show'])->name('show-examen');
    Route::get('/examen/{designation_univ}/ufr-{designation_ufr}/{designation_filiere}/create', [ExamenController::class, 'create'])->name('form-create-examen');
    Route::post('/examen/{designation_univ}/ufr-{designation_ufr}/{designation_filiere}/store', [ExamenController::class, 'store'])->name('store-examen-data');
    Route::get('/examen/{designation_univ}/ufr-{designation_ufr}/{designation_filiere}/edit-{id_examen}', [ExamenController::class, 'edit'])->name('form-edit-examen');
    Route::post('/examen/{designation_univ}/ufr-{designation_ufr}/{designation_filiere}/update-{id_examen}', [ExamenController::class, 'update'])->name('update-examen-data');
    Route::get('/examen/{designation_univ}/ufr-{designation_ufr}/{designation_filiere}/destroy-{id_examen}', [ExamenController::class, 'destroy'])->name('destroy-examen-data');

    Route::get('/examen/{designation_univ}/ufr-{designation_ufr}/{designation_filiere}/{id_examen}', [ExamenController::class, 'show_examen'])->name('show-filiere-examen');

    Route::get('/examen/{designation_univ}/ufr-{designation_ufr}/{designation_filiere}/correction/{id_examen}/', [CorrectionController::class, 'correction'])->name('show-filiere-examen-correction');
});

Route::middleware(['throttle:60, 1', 'auth'])->group(function () {
    Route::get('user/', [UserController::class, 'index'])->name('user');
    Route::get('form-create-user/', [UserController::class, 'create'])->name('form-create-user');
    Route::post('store-user-data/', [UserController::class, 'store'])->name('store-user-data');
    Route::get('show-user/{id}', [UserController::class, 'show'])->name('show-user');
    Route::get('form-edit-user-data/{id}', [UserController::class, 'edit'])->name('form-edit-user-data');
    Route::post('update-user-data/{id}', [UserController::class, 'update'])->name('update-user-data');
    Route::get('destroy-user-data/{id}', [UserController::class, 'destroy'])->name('destroy-user-data');
});

Route::middleware(['throttle:60, 1', 'auth'])->group(function () {
    Route::get('role/', [RoleController::class, 'index'])->name('role');
    Route::get('form-create-role/', [RoleController::class, 'create'])->name('form-create-role');
    Route::post('store-role-data/', [RoleController::class, 'store'])->name('store-role-data');
    Route::get('form-edit-role-data/{id}', [RoleController::class, 'edit'])->name('form-edit-role-data');
    Route::post('update-role-data/{id}', [RoleController::class, 'update'])->name('update-role-data');
    Route::get('destroy-role-data/{id}', [RoleController::class, 'destroy'])->name('destroy-role-data');
});

Route::middleware(['throttle:60, 1', 'auth'])->group(function () {
    Route::get('profil/', [ProfilController::class, 'index'])->name('profil');

    Route::get('/deconnexion', [LogoutController::class, 'perForm'])->name('logout.perForm');
});

Route::middleware(['throttle:60, 1', 'auth'])->group(function () {
    Route::get('/privates', function () {
        return "Privates routes";
    });
});
