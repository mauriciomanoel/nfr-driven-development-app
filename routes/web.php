<?php


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


//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('/register', 'Auth\RegisterController@create')->name('register');

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RequirementsController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ArtifactsController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\BreadController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MenuElementController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\FrameworkController;
use App\Http\Controllers\LegalAndNormativeRequirementsController;
use App\Http\Controllers\NonFunctionalRequirementsController;



Route::get('/', function () {           return redirect('/home'); });
Auth::routes();

Route::group(['middleware' => 'auth'], function () {

     Route::group(['middleware' => ['get.menu', 'get.projects']], function () {
        Route::resource('home', DashboardController::class);

        Route::post('/projects/current', [ProjectsController::class, 'current'])->name('projects.current');
        Route::resource('projects', ProjectsController::class);
        Route::resource('requirements', RequirementsController::class);
        // Route::resource('framework', FrameworkController::class);

        Route::prefix('framework')->group(function () {  
            Route::get('/', [FrameworkController::class, 'index'])->name('framework.index');
            Route::get('/step1', [FrameworkController::class, 'step1'])->name('framework.step1');
            Route::get('/step2', [FrameworkController::class, 'step2'])->name('framework.step2');
            Route::get('/step3', [FrameworkController::class, 'step3'])->name('framework.step3');
            Route::get('/step4', [FrameworkController::class, 'step4'])->name('framework.step4');
            Route::get('/step5', [FrameworkController::class, 'step5'])->name('framework.step5');
            
        });

        Route::resource('legalAndNormativeRequirements', LegalAndNormativeRequirementsController::class);
        Route::resource('nonFunctionalRequirements', NonFunctionalRequirementsController::class);
        Route::get('nonFunctionalRequirements/downloadSIG/{id}', [NonFunctionalRequirementsController::class, 'downloadSIG'])->name('download.sig');


        Route::prefix('artifacts')->group(function () {  
            Route::get('/storytellings', [ArtifactsController::class, 'indexStorytellings'])->name('artifacts.storytellings.index');
            Route::get('/taxonomies', [ArtifactsController::class, 'indexTaxonomies'])->name('artifacts.storytellings.index');
            Route::get('/create', [ArtifactsController::class, 'create'])->name('menu.menu.create');
            Route::get('/store', [ArtifactsController::class, 'store'])->name('menu.menu.store');
            Route::get('/edit', [ArtifactsController::class, 'edit'])->name('menu.menu.edit');
            Route::get('/{id}', [ArtifactsController::class, 'show'])->name('menu.show');
            Route::get('/update', [ArtifactsController::class, 'update'])->name('menu.menu.update');
            Route::get('/delete', [ArtifactsController::class, 'delete'])->name('menu.menu.delete');
        });

    
        Route::group(['middleware' => ['role:user']], function () {
            Route::get('/colors', function () {     return view('dashboard.colors'); });
            Route::get('/typography', function () { return view('dashboard.typography'); });
            Route::get('/charts', function () {     return view('dashboard.charts'); });
            Route::get('/widgets', function () {    return view('dashboard.widgets'); });
            Route::get('/404', function () {        return view('dashboard.404'); });
            Route::get('/500', function () {        return view('dashboard.500'); });

            Route::prefix('base')->group(function () {  
                Route::get('/breadcrumb', function(){   return view('dashboard.base.breadcrumb'); });
                Route::get('/cards', function(){        return view('dashboard.base.cards'); });
                Route::get('/carousel', function(){     return view('dashboard.base.carousel'); });
                Route::get('/collapse', function(){     return view('dashboard.base.collapse'); });
    
                Route::get('/forms', function(){        return view('dashboard.base.forms'); });
                Route::get('/jumbotron', function(){    return view('dashboard.base.jumbotron'); });
                Route::get('/list-group', function(){   return view('dashboard.base.list-group'); });
                Route::get('/navs', function(){         return view('dashboard.base.navs'); });
    
                Route::get('/pagination', function(){   return view('dashboard.base.pagination'); });
                Route::get('/popovers', function(){     return view('dashboard.base.popovers'); });
                Route::get('/progress', function(){     return view('dashboard.base.progress'); });
                Route::get('/scrollspy', function(){    return view('dashboard.base.scrollspy'); });
    
                Route::get('/switches', function(){     return view('dashboard.base.switches'); });
                Route::get('/tables', function () {     return view('dashboard.base.tables'); });
                Route::get('/tabs', function () {       return view('dashboard.base.tabs'); });
                Route::get('/tooltips', function () {   return view('dashboard.base.tooltips'); });
            });
            Route::prefix('buttons')->group(function () {  
                Route::get('/buttons', function(){          return view('dashboard.buttons.buttons'); });
                Route::get('/button-group', function(){     return view('dashboard.buttons.button-group'); });
                Route::get('/dropdowns', function(){        return view('dashboard.buttons.dropdowns'); });
                Route::get('/brand-buttons', function(){    return view('dashboard.buttons.brand-buttons'); });
            });
            Route::prefix('icon')->group(function () {  // word: "icons" - not working as part of adress
                Route::get('/coreui-icons', function(){         return view('dashboard.icons.coreui-icons'); });
                Route::get('/flags', function(){                return view('dashboard.icons.flags'); });
                Route::get('/brands', function(){               return view('dashboard.icons.brands'); });
            });
            Route::prefix('notifications')->group(function () {  
                Route::get('/alerts', function(){   return view('dashboard.notifications.alerts'); });
                Route::get('/badge', function(){    return view('dashboard.notifications.badge'); });
                Route::get('/modals', function(){   return view('dashboard.notifications.modals'); });
            });
            Route::resource('notes', NotesController::class);
        });
        
        Route::group(['middleware' => ['role:admin']], function () {
            Route::resource('bread', BreadController::class); //create BREAD (resource)
            Route::resource('users', UsersController::class)->except( ['create', 'store'] );
            Route::resource('roles', RolesController::class);
            Route::resource('mail', MailController::class);
            Route::get('/prepareSend/{id}', [MailController::class, 'prepareSend'])->name('prepareSend');
            Route::post('/mailSend/{id}', [MailController::class, 'send'])->name('mailSend');

            Route::get('/roles/move/move-up', [RolesController::class, 'moveUp'])->name('roles.up');
            Route::get('/roles/move/move-down',    [RolesController::class, 'moveDown'])->name('roles.down');

            Route::prefix('menu/element')->group(function () { 
                Route::get('/',             [MenuElementController::class, 'index'])->name('menu.index');
                Route::get('/move-up',      [MenuElementController::class, 'moveUp'])->name('menu.up');
                Route::get('/move-down',    [MenuElementController::class, 'moveDown'])->name('menu.down');
                Route::get('/create',       [MenuElementController::class, 'create'])->name('menu.create');
                Route::post('/store',       [MenuElementController::class, 'store'])->name('menu.store');
                Route::get('/get-parents',  [MenuElementController::class, 'getParents']);
                Route::get('/edit',         [MenuElementController::class, 'edit'])->name('menu.edit');
                Route::post('/update',      [MenuElementController::class, 'update'])->name('menu.update');
                Route::get('/show',         [MenuElementController::class, 'show'])->name('menu.show');
                Route::get('/delete',       [MenuElementController::class, 'delete'])->name('menu.delete');
            });
            Route::prefix('menu/menu')->group(function () { 
                Route::get('/',         [MenuElementController::class, 'index'])->name('menu.menu.index');
                Route::get('/create',   [MenuElementController::class, 'create'])->name('menu.menu.create');
                Route::post('/store',   [MenuElementController::class, 'store'])->name('menu.menu.store');
                Route::get('/edit',     [MenuElementController::class, 'edit'])->name('menu.menu.edit');
                Route::post('/update',  [MenuElementController::class, 'update'])->name('menu.menu.update');
                Route::get('/delete',   [MenuElementController::class, 'delete'])->name('menu.menu.delete');
            });
            Route::prefix('media')->group(function () {
                Route::get('/',                 [MediaController::class, 'index'])->name('media.folder.index');
                Route::get('/folder/store',     [MediaController::class, 'folderAdd'])->name('media.folder.add');
                Route::post('/folder/update',   [MediaController::class, 'folderUpdate'])->name('media.folder.update');
                Route::get('/folder',           [MediaController::class, 'folder'])->name('media.folder');
                Route::post('/folder/move',     [MediaController::class, 'folderMove'])->name('media.folder.move');
                Route::post('/folder/delete',   [MediaController::class, 'folderDelete'])->name('media.folder.delete');;
    
                Route::post('/file/store',      [MediaController::class, 'fileAdd'])->name('media.file.add');
                Route::get('/file',             [MediaController::class, 'file']);
                Route::post('/file/delete',     [MediaController::class, 'fileDelete'])->name('media.file.delete');
                Route::post('/file/update',     [MediaController::class, 'fileUpdate'])->name('media.file.update');
                Route::post('/file/move',       [MediaController::class, 'fileMove'])->name('media.file.move');
                Route::post('/file/cropp',      [MediaController::class, 'cropp']);
                Route::get('/file/copy',        [MediaController::class, 'fileCopy'])->name('media.file.copy');
            });
        });

        Route::resource('resource/{table}/resource', ResourceController::class)->names([
            'index'     => 'resource.index',
            'create'    => 'resource.create',
            'store'     => 'resource.store',
            'show'      => 'resource.show',
            'edit'      => 'resource.edit',
            'update'    => 'resource.update',
            'destroy'   => 'resource.destroy'
        ]);
        
    });
    
});

