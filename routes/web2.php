<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PLController;
use App\Http\Controllers\CPLController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MKController;
use App\Http\Controllers\BKController;
use App\Http\Controllers\CplPlController;
use App\Http\Controllers\BkMkController;
use App\Http\Controllers\CplBkController;
use App\Http\Controllers\CplMkController;
use App\Http\Controllers\CpmkController;

use App\Http\Controllers\CplBkMkController;
use App\Http\Controllers\OrganisasiMKController;
use App\Http\Controllers\PemenuhanCPLController;

use App\Http\Controllers\CplCpmkController;
use App\Http\Controllers\SubCPMKController;

use Illuminate\Support\Facades\Auth;

// Main routes
Route::get('/', function () {
    return view('auth.login');
});

// Authentication routes (login, logout, etc.)
Auth::routes();

// Home route
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Dashboard routes
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/dashboard/upload-file', [DashboardController::class, 'storeOrUpdateFile'])->name('dashboard.upload-file');

// CRUD routes for UserController
Route::resource('user', UserController::class);

// CRUD routes for RoleController
Route::resource('role', RoleController::class);
Route::get('role/{role}/edit-permissions', [RoleController::class, 'editPermissions'])->name('role.edit.permissions');
Route::put('role/{role}/update-permissions', [RoleController::class, 'updatePermissions'])->name('role.update.permissions');

// Routes for assigning permissions to role
Route::get('role-permissions/{id}', [RoleController::class, 'rolePermissions'])->name('role.permissions');
Route::post('do-role-permissions', [RoleController::class, 'doRolePermissions'])->name('do.role.permissions');

// CRUD routes for PermissionController
Route::resource('/permission', PermissionController::class);

// CRUD routes for PLController
Route::resource('/pl', PLController::class);
Route::get('/pdf/pl', [PLController::class, 'printPDF'])->name('pl.print_pdf');

// CRUD routes for CPLController
Route::resource('cpl', CPLController::class);
Route::get('/cpl/autocomplete', [CPLController::class, 'autocomplete'])->name('cpl.autocomplete');
Route::get('/pdf/cpl', [CPLController::class, 'printPDF'])->name('pdf.cpl');

// CRUD routes for MKController
Route::resource('mk', MKController::class);
Route::get('/pdf/mk', [MKController::class, 'printPDF'])->name('pdf.mk');

// CRUD routes for BKController
Route::resource('bk', BKController::class);
Route::get('/pdf/bk', [BKController::class, 'printPDF'])->name('pdf.bk');

// Routes for viewing and editing the CPL-PL relationship
Route::get('/cplpl', [CplPlController::class, 'index'])->name('cplpl.index');
Route::get('/cplpl/edit', [CplPlController::class, 'edit'])->name('cplpl.edit');
Route::put('/cplpl/update', [CplPlController::class, 'update'])->name('cplpl.update');
Route::get('/pdf/cplpl_pdf', [CplPlController::class, 'printPDF'])->name('pdf.cplpl');

// Routes for viewing and editing the BK-MK relationship
Route::get('/BkMk', [BkMkController::class, 'index'])->name('BkMk.index');
Route::get('/BkMk/edit', [BkMkController::class, 'edit'])->name('BkMk.edit');
Route::put('/BkMk/update', [BkMkController::class, 'update'])->name('BkMk.update');
Route::get('/pdf/bk_mk_pdf', [BkMkController::class, 'printPDF'])->name('pdf.bk_mk');

// Routes for viewing and editing the CPL-BK relationship
Route::get('/cplbk', [CplBkController::class, 'index'])->name('cplbk.index');
Route::get('/cplbk/edit', [CplBkController::class, 'edit'])->name('cplbk.edit');
Route::put('/cplbk/update', [CplBkController::class, 'update'])->name('cplbk.update');
Route::get('/pdf/cplbk', [CplBkController::class, 'printPDF'])->name('pdf.cplbk');

// Routes for viewing and editing the CPL-MK relationship
Route::get('/cplmk', [CplMkController::class, 'index'])->name('cplmk.index');
Route::get('/cplmk/edit', [CplMkController::class, 'edit'])->name('cplmk.edit');
Route::put('/cplmk/update', [CplMkController::class, 'update'])->name('cplmk.update');
Route::get('/pdf/cplmk', [CplMkController::class, 'printPDF'])->name('pdf.cplmk');

// Routes for CPL-BK-MK relationships
Route::get('/cplbkmk', [CplBkMkController::class, 'index'])->name('cplbkmk.index');
Route::get('/cplbkmk/edit', [CplBkMkController::class, 'edit'])->name('cplbkmk.edit');
Route::post('/cplbkmk/save', [CplBkMkController::class, 'save'])->name('cplbkmk.save');
Route::get('/autocomplete/mk', [CplBkMkController::class, 'autocomplete'])->name('cplbkmk.autocomplete');
Route::get('/pdf/cplbkmk', [CplBkMkController::class, 'printPDF'])->name('pdf.cplbkmk');

// Routes for OrganisasiMKController
Route::get('/organisasi-mk', [OrganisasiMKController::class, 'index'])->name('organisasi.mk');
Route::get('/pdf/organisasi-mk', [OrganisasiMKController::class, 'printPDF'])->name('pdf.organisasi-mk');

// Routes for PemenuhanCPLController
Route::get('/pemenuhan-cpl', [PemenuhanCPLController::class, 'index'])->name('pemenuhan_cpl.index');
Route::get('/pdf/pemenuhan-cpl', [PemenuhanCPLController::class, 'printPDF'])->name('pdf.pemenuhan_cpl');

// Routes for CpmkController
Route::prefix('pages_01')->group(function () {
    Route::resource('cpmk', CpmkController::class)->except(['show']);
    Route::get('cpmk-matrix', [CpmkController::class, 'showMatrix'])->name('pages_01.cpmk.matrix');
    Route::get('pdf/cpmk', [CpmkController::class, 'generatePDF'])->name('pdf.cpmk');
    Route::get('cpmk/{id}/validate', [CpmkController::class, 'showValidateForm'])->name('pages_01.cpmk.show_validate_form');
    Route::post('cpmk/{id}/validate', [CpmkController::class, 'processValidation'])->name('pages_01.cpmk.validate.save');
    Route::get('cpmk/{id}/revisi', [CpmkController::class, 'showRevisiForm'])->name('pages_01.cpmk.show_revisi_form');
    Route::post('cpmk/{id}/revisi', [CpmkController::class, 'processRevisi'])->name('pages_01.cpmk.process_revisi');
});

// Routes for CplCpmkController
Route::get('/cpl_cpmk', [CplCpmkController::class, 'index'])->name('cpl_cpmk.index');
Route::get('/pdf/cpl_cpmk', [CplCpmkController::class, 'generatePDF'])->name('pdf.cpl_cpmk');

// Routes for SubCPMKController
Route::prefix('sub_cpmk')->group(function () {
    Route::get('/', [SubCPMKController::class, 'index'])->name('sub_cpmk.index');
    Route::get('/create', [SubCPMKController::class, 'create'])->name('sub_cpmk.create');
    Route::post('/', [SubCPMKController::class, 'store'])->name('sub_cpmk.store');
    Route::get('/{subcpmk}/edit', [SubCPMKController::class, 'edit'])->name('sub_cpmk.edit');
    Route::put('/{subcpmk}', [SubCPMKController::class, 'update'])->name('sub_cpmk.update');
    Route::delete('/{subcpmk}', [SubCPMKController::class, 'destroy'])->name('sub_cpmk.destroy');
    Route::get('/{subcpmk}/show', [SubCPMKController::class, 'show'])->name('sub_cpmk.show');
    Route::get('/pdf/sub_cpmk', [SubCPMKController::class, 'generatePDF'])->name('pdf.sub_cpmk');
});

