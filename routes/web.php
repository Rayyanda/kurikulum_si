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
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CplCpmkController;
use App\Http\Controllers\SubCPMKController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RubrikSkalaPresepsiController;
use App\Http\Controllers\QuestionerController;
use App\Http\Controllers\RubrikAnalitikController;
use App\Http\Controllers\RubrikHolistikController;
use App\Http\Controllers\BobotPenilaianController;
use App\Http\Controllers\NilaiMahasiswaController;
use App\Http\Controllers\NilaiAkhirMKController;
use App\Http\Controllers\RpsController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JadwalRpsController;

// Main routes
Route::get('/', function () {
    return view('dashboard');
});

// Authentication routes (login, logout, etc.)
Auth::routes();

// Home route
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/kenji', function(){
    return redirect('http://laravel_cpl_kenji.test');
})->name('kenji');

// Dashboard routes
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::post('/dashboard/upload-file', [DashboardController::class, 'storeOrUpdateFile'])->name('dashboard.upload-file');

// CRUD routes for UserController
Route::resource('user', UserController::class);

// CRUD routes for RoleController
Route::resource('role', RoleController::class);
Route::get('role/{role}/edit-permissions', [RoleController::class, 'editPermissions'])->name('role.edit.permissions');
Route::put('role/{role}/update-permissions', [RoleController::class, 'updatePermissions'])->name('role.update.permissions');
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



// Route untuk BkMkController
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


// Route for the Rubrik Skala Analitik index
Route::get('rubrik_analitik', [RubrikAnalitikController::class, 'index'])->name('rubrik_analitik.index');

// Route for storing a new rubrik in the Analitik version
Route::post('rubrik_analitik', [RubrikAnalitikController::class, 'store'])->name('rubrik_analitik.store');

// Route for updating an existing rubrik in the Analitik version
Route::put('rubrik_analitik/{id}', [RubrikAnalitikController::class, 'update'])->name('rubrik_analitik.update');

// Route for deleting a rubrik from the Analitik version
Route::delete('rubrik_analitik/{id}', [RubrikAnalitikController::class, 'destroy'])->name('rubrik_analitik.destroy');


// route holisitik
Route::get('rubrik_holistik', [RubrikHolistikController::class, 'index'])->name('rubrik_holistik.index');
Route::post('rubrik_holistik', [RubrikHolistikController::class, 'store'])->name('rubrik_holistik.store');
Route::put('rubrik_holistik/{id}', [RubrikHolistikController::class, 'update'])->name('rubrik_holistik.update');
Route::delete('rubrik_holistik/{id}', [RubrikHolistikController::class, 'destroy'])->name('rubrik_holistik.destroy');





// Routes for CpmkController
Route::prefix('pages_01')->group(function () {
    Route::resource('cpmk', CpmkController::class)->except(['show']);
    Route::get('cpmk-matrix', [CpmkController::class, 'showMatrix'])->name('cpmk.matrix');
    Route::get('pdf/cpmk', [CpmkController::class, 'generatePDF'])->name('pdf.cpmk');
    Route::get('cpmk/{id}/validate', [CpmkController::class, 'showValidateForm'])->name('cpmk.show_validate_form');
    Route::post('cpmk/{id}/validate', [CpmkController::class, 'processValidation'])->name('cpmk.validate.save');
    Route::get('cpmk/{id}/revisi', [CpmkController::class, 'showRevisiForm'])->name('cpmk.show_revisi_form');
    Route::post('cpmk/{id}/revisi', [CpmkController::class, 'processRevisi'])->name('cpmk.process_revisi');
    Route::get('cpmk/mk/{mk_id}',[CpmkController::class, 'find_json'])->name('get.json');
});



// Routes for CplCpmkController
Route::get('/cpl_cpmk', [CplCpmkController::class, 'index'])->name('cpl_cpmk.index');
Route::get('/pdf/cpl_cpmk', [CplCpmkController::class, 'generatePDF'])->name('pdf.cpl_cpmk');
  Route::prefix('sub_cpmk')->group(function () {
        Route::get('/', [SubCPMKController::class, 'index'])->name('sub_cpmk.index');
        Route::get('/create', [SubCPMKController::class, 'create'])->name('sub_cpmk.create');
        Route::post('/', [SubCPMKController::class, 'store'])->name('sub_cpmk.store');
        Route::get('/{subcpmk}/edit', [SubCPMKController::class, 'edit'])->name('sub_cpmk.edit');
        Route::put('/{subcpmk}', [SubCPMKController::class, 'update'])->name('sub_cpmk.update'); // Menggunakan metode PUT untuk update
        Route::delete('/{subcpmk}', [SubCPMKController::class, 'destroy'])->name('sub_cpmk.destroy');

        // Validasi
        Route::get('/{subcpmk}/validate', [SubCPMKController::class, 'showValidateForm'])->name('sub_cpmk.show_validate_form');
        Route::post('/{subcpmk}/process_validation', [SubCPMKController::class, 'processValidation'])->name('sub_cpmk.process_validation');

        // PDF
        Route::get('/pdf/subcpmks', [SubCPMKController::class, 'generatePDF'])->name('pdf.subcpmk');

        // Revisi
        Route::get('/{subcpmk}/revisi', [SubCPMKController::class, 'showRevisiForm'])->name('sub_cpmk.show_revisi_form');
        Route::put('/{subcpmk}/process_revisi', [SubCPMKController::class, 'processRevisi'])->name('sub_cpmk.process_revisi'); // Gunakan metode PUT untuk proses revisi

        // AJAX Request untuk mengambil CPMK dan SubCPMK berdasarkan MK
        Route::get('/get_cpmks/{mk_id}', [SubCPMKController::class, 'getCpmks'])->name('sub_cpmk.get_cpmks');
        Route::get('/get_subcpmks/{cpmk_id}', [SubCPMKController::class, 'getSubCpmks'])->name('sub_cpmk.get_subcpmks');
    });


// Nilai Mahasiswa
Route::prefix('nilai_mahasiswa')->name('nilai_mahasiswa.')->group(function() {
    Route::get('/mata-kuliah', [NilaiMahasiswaController::class, 'index'])->name('index');
    Route::get('/pilih-mata-kuliah', [NilaiMahasiswaController::class, 'pilihMataKuliah'])->name('pilih-mata-kuliah'); // Halaman menampilkan data nilai mahasiswa
    Route::post('/mata-kuliah', [NilaiMahasiswaController::class, 'nilaiMataKuliah'])->name('mata-kuliah'); // Menampilkan data nilai berdasarkan mata kuliah yang dipilih
    Route::get('/downloadPdf', [NilaiMahasiswaController::class, 'downloadPdf'])->name('downloadPdf'); // Mengunduh data nilai mahasiswa sebagai PDF
    Route::get('/create', [NilaiMahasiswaController::class, 'create'])->name('create'); // Menampilkan form untuk menambahkan nilai mahasiswa
    Route::post('/store', [NilaiMahasiswaController::class, 'store'])->name('store'); // Menyimpan data nilai mahasiswa baru
    Route::get('/edit/{Nim}', [NilaiMahasiswaController::class, 'edit'])->name('edit'); // Menampilkan form untuk mengedit nilai mahasiswa
    Route::put('/update/{Nim}', [NilaiMahasiswaController::class, 'update'])->name('update'); // Memperbarui data nilai mahasiswa
    Route::delete('/delete/{Nim}', [NilaiMahasiswaController::class, 'destroy'])->name('destroy'); // Menghapus data nilai mahasiswa
});
Route::get('/nilai-mahasiswa', [NilaiMahasiswaController::class, 'index'])->name('nilai_mahasiswa.index');
Route::post('/nilai-mahasiswa/import', [NilaiMahasiswaController::class, 'import'])->name('nilai_mahasiswa.import');Route::middleware(['auth'])->group(function () {
    // Route for index view
    Route::get('/nilai-mahasiswa', [NilaiMahasiswaController::class, 'index'])->name('nilai_mahasiswa.index');

    // Route for showing data of a specific course
    Route::get('/nilai-mahasiswa/{kodeMataKuliah}', [NilaiMahasiswaController::class, 'show'])->name('nilai_mahasiswa.show');

    // Other routes...
});
// Penilaian routes
//Route::resource('/penilaian', PenilaianController::class);


  Route::get('rubrik_presepsi', [RubrikSkalaPresepsiController::class, 'index'])->name('rubrik_presepsi.index');
    Route::get('rubrik_presepsi/create', [RubrikSkalaPresepsiController::class, 'create'])->name('rubrik_presepsi.create');
    Route::post('rubrik_presepsi', [RubrikSkalaPresepsiController::class, 'store'])->name('rubrik_presepsi.store');
    Route::get('rubrik_presepsi/{id}/edit', [RubrikSkalaPresepsiController::class, 'edit'])->name('rubrik_presepsi.edit');
    Route::put('rubrik_presepsi/{id}', [RubrikSkalaPresepsiController::class, 'update'])->name('rubrik_presepsi.update');
    Route::delete('rubrik_presepsi/{id}', [RubrikSkalaPresepsiController::class, 'destroy'])->name('rubrik_presepsi.destroy');


// Rumusan Nilai Akhir MK
Route::prefix('nilai-akhir-mk')->name('nilai_akhir_mk.')->group(function() {
    Route::get('/mk', [NilaiAkhirMKController::class, 'indexMK'])->name('indexMK');
    Route::get('/create-mk', [NilaiAkhirMKController::class, 'createMK'])->name('createMK');
    Route::post('/store-mk', [NilaiAkhirMKController::class, 'storeMK'])->name('storeMK');
    Route::get('/{id}/edit-mk', [NilaiAkhirMKController::class, 'editMK'])->name('editMK');
    Route::put('/{id}/update-mk', [NilaiAkhirMKController::class, 'updateMK'])->name('updateMK');
    Route::delete('/{id}/destroy-mk', [NilaiAkhirMKController::class, 'destroyMK'])->name('destroyMK');

    Route::get('/cpl', [NilaiAkhirMKController::class, 'indexCPL'])->name('indexCPL');
    Route::get('/create-cpl', [NilaiAkhirMKController::class, 'createCPL'])->name('createCPL');
    Route::post('/store-cpl', [NilaiAkhirMKController::class, 'storeCPL'])->name('storeCPL');
    Route::get('/{id}/edit-cpl', [NilaiAkhirMKController::class, 'editCPL'])->name('editCPL');
    Route::put('/{id}/update-cpl', [NilaiAkhirMKController::class, 'updateCPL'])->name('updateCPL');
    Route::delete('/{id}/destroy-cpl', [NilaiAkhirMKController::class, 'destroyCPL'])->name('destroyCPL');
});



Route::prefix('bobot-penilaian')->name('bobot_penilaian.')->group(function () {
    Route::get('/', [BobotPenilaianController::class, 'index'])->name('index');
    Route::get('create', [BobotPenilaianController::class, 'create'])->name('create');
    Route::post('store', [BobotPenilaianController::class, 'store'])->name('store');
    Route::get('{id}/edit', [BobotPenilaianController::class, 'edit'])->name('edit');
    Route::put('{id}', [BobotPenilaianController::class, 'update'])->name('update');
    Route::delete('{id}', [BobotPenilaianController::class, 'destroy'])->name('destroy');
    Route::get('get-mks/{cpl_id}', [BobotPenilaianController::class, 'getMKs'])->name('get.mks');
    Route::get('get-cpmks/{mk_id}', [BobotPenilaianController::class, 'getCPMKs'])->name('get.cpmks');
});

Route::prefix('penilaian')->middleware(['auth'])->name('penilaian.')->group(function(){

    Route::get('/',[PenilaianController::class,'index'])->name('index');

    Route::get('/nilai-akhir',[PenilaianController::class,'nilai_akhir'])->name('nilai_akhir');

    Route::get('/nilai-akhir/pdf',[PenilaianController::class,'export_nilai_akhir'])->name('nilai-akhir.export');

    Route::get('/{id}/edit',[PenilaianController::class,'edit'])->name('edit');

    Route::post('/store',[PenilaianController::class,'store'])->name('store');

    Route::post('/{id}/update',[PenilaianController::class,'update'])->name('update');

    Route::delete('/{id}/delete',[PenilaianController::class,'destroy'])->name('delete');

    Route::get('/skor/{cpmk_id}',[PenilaianController::class,'getscore'])->name('get.cpmk.skor');

    Route::get('/matriks',[PenilaianController::class,'matriks'])->name('matriks');

    Route::get('/matriks-edit',[PenilaianController::class,'edit_matriks'])->name('matriks.edit');

    Route::post('/matriks-update',[PenilaianController::class,'update_matriks'])->name('matriks.update');

});

//RPS
Route::prefix('rps')->name('rps.')->group(function () {

    //index rps
    Route::get('/', [RPSController::class, 'index'])->name('index');

    //create
    Route::post('create', [RPSController::class, 'create'])->name('create');

    //store
    Route::post('/new',[RpsController::class,'store'])->name('doc.store');

    Route::get('/generate-pdf/{id}',[RPSController::class,'generatePDF'])->name('gen.pdf');

    Route::delete('{id}',[RPSController::class, 'destroy'])->name('destroy');

    Route::get('edit/{id}',[RpsController::class,'edit'])->name('edit');

    Route::patch('/{id}/update',[RpsController::class,'update'])->name('update');

    Route::post('/fromPDF',[RPSController::class,'fromPDF'])->name('from-pdf');


    Route::prefix('jadwal')->group(function(){

        Route::get('/{rps_id}',[JadwalRpsController::class,'index'])->name('jadwal.index');

        Route::post('/insert',[JadwalRpsController::class,'store'])->name('jadwal.store');

        Route::get('/edit/{rps_id}/{id}',[JadwalRpsController::class,'edit'])->name('jadwal.edit');

        Route::post('/update/{id}',[JadwalRpsController::class,'update'])->name('jadwal.update');

        Route::delete('/destroy/{rps_id}/{id}',[JadwalRpsController::class,'destroy'])->name('jadwal.delete');

    });


});

//Dosen
Route::prefix('dosen')->name('dosen.')->group(function () {

    Route::get('/', [DosenController::class, 'index'])->name('index');

    Route::get('/create',[DosenController::class,'create'])->name('create');

    Route::post('/store',[DosenController::class,'store'])->name('store');

    Route::get('/{id}/edit',[DosenController::class,'edit'])->name('edit');

    Route::post('/{id}/update',[DosenController::class,'update'])->name('update');

    Route::delete('{id}/delete',[DosenController::class,'destroy'])->name('delete');
});




// RPS routes
Route::resource('/rps', RpsController::class);

// Bobot CLO routes
Route::resource('/bobot-clo', BobotPenilaianController::class);

// Add any additional routes below
//
  // ajax get roles by user
    Route::get('user-roles/{id}', [UserController::class, 'userRoles']);

    // submit assign roles to user
    Route::post('do-assign-user-roles', [UserController::class, 'doAssignUserRoles']);

