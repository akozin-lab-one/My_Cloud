<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ajaxController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FileListController;

Route::middleware('admin_auth')->group(function(){
    // mainroute
    Route::redirect('/', 'loginPage');

    // loginPage
    Route::get('/loginPage', [AuthController::class, 'LoginPage'])->name('Auth#loginPage');

    // registerPage
    Route::get('/registerPage', [AuthController::class, 'RegisterPage'])->name('Auth#registerPage');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    //admin
    Route::prefix('admin')->group(function(){
        Route::get('main', [AdminController::class, 'mainPage'])->name('admin#mainPage');
    });

    //user
    Route::prefix('user')->group(function(){
        //folderupdate
        Route::get('/main/list', [FileListController::class, 'userMainPage'])->name('user#mainPage');

        // fileupload
        Route::post('upload/file', [FileListController::class, 'fileUploadPage'])->name('user#fileupload');

        // folderupload
        Route::post('upload/folder', [FileListController::class, 'folderUploadPage'])->name('user#folderupload');

        //subfolder
        Route::get('/{foldername}', [FileListController::class, 'FolderPage'])->name('user#folderPage');

        //doublesubFolder
        Route::get('/{foldername}/{subfoldername}', [FileListController::class, 'DoubleSubFolderPage'])->name('user#doublePage');

        //subfile
        // Route::get('/createFile', [FileListController::class, 'SubFileUpload'])->name('user#subFile');

        //folderRenamePage
        Route::get('rename/folder/{folderId}', [FileListController::class, 'folderRenamePage'])->name('userfolder#Rename');

        //folderRename
        Route::post('rename/folder', [FileListController::class, 'FolderRename'])->name('userfolder#Rename');

        //fileRenamePage
        Route::get('rename/file/{fileId}', [FileListController::class, 'fileRenamePage'])->name('userfile#Rename');

        //fileRename
        Route::post('rename/file', [FileListController::class, 'fileRename'])->name('userfile#Rename');

        //folderDelete
        Route::post('delete/{folderId}',[FileListController::class, 'FolderDeletePage'])->name('userfolder#delete');

        //fileDelete
        Route::post('delete/{fileId}', [FileListController::class, 'FileDeletePage'])->name('userfile#delete');

        // ajax
        Route::prefix('ajax')->group(function(){
            //mainPagecreate
            Route::get('create/folder', [ajaxController::class, 'folderCreatePage'])->name('user#ajazPage');

            //foldercreatePage
            Route::get('create/subfolder', [ajaxController::class, 'subFolderCreatePage'])->name('user#ajaxfoldercreate');
        });
    });
});
