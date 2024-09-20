<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RolePermissionController;
use App\Http\Controllers\Admin\UniversityController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function () {

    Route::get('', [AdminController::class, 'redirectToLogin']);

    Route::prefix('/login')->group(function () {
        Route::get('', [AuthController::class, 'index'])->name('admin.login.index');
        Route::post('', [AuthController::class, 'store'])->name('admin.login.store');
    });


    Route::group(['middleware' => 'admin'], function () {

        // Display Admin Dashboard
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard'); // Display Admin Dashboard



        // Roles (CRUD Routes)
        Route::prefix('roles')->controller(RoleController::class)->group(function(){
            Route::get('', 'index')->name('admin.rolePage'); // Display Roles Data page

            //Role Add Permission
            Route::group(['middleware' => 'check:role_add'],function(){
                Route::get('form', 'showRolesForm')->name('admin.showRoleForm'); // Display Roles Form Page
                Route::post('add',  'storeRole')->name('admin.storeRole'); // This post route for add the Roles
            });

            //Role Add Permission
            Route::group(['middleware' => 'check:role_edit'],function(){
                Route::get('{id}/edit',  'editRole')->name('admin.editRole'); // Display with edit data Role Form Page
                Route::put('/update/{id}',  'updateRole')->name('admin.updateRole'); // This post route for update the Role
            });


            Route::group(['middleware' => 'check:role_delete'],function(){
                Route::delete('/delete/{id}',  'deleteRole')->name('admin.deleteRole'); // This post route for delete the Permissions
            });
        });



        // Permission (CRUD Routes)
        Route::prefix('permission')->controller(PermissionsController::class)->group(function(){
            Route::get('',  'index')->name('admin.permissionPage'); // Display Permission Data page

            Route::group(['middleware' => 'check:permission_add'],function(){
                Route::get('form',  'showPermissionForm')->name('admin.showPermissionForm'); // Display Permission Form Page
                Route::post('add',  'storePermission')->name('admin.storePermission'); // This post route for add the Permissions
            });


            Route::group(['middleware' => 'check:permission_edit'],function(){
                Route::get('{id}/edit',  'editPermission')->name('admin.editPermission'); // Display with edit data Permission Form Page
                Route::put('update/{id}',  'updatePermission')->name('admin.updatePermission'); // This post route for update the Permissions
            });

            Route::group(['middleware' => 'check:permission_delete'],function(){
                Route::delete('delete/{id}',  'deletePermission')->name('admin.deletePermission'); // This post route for delete the Permissions
            });
        });

        // Role - Permission (CRUD Routes)
        Route::prefix('role-permission')->controller(RolePermissionController::class)->group(function(){
            Route::get('',  'index')->name('admin.showRolePermission'); // Display Role-Permission Data page

            Route::group(['middleware' => 'check:role_permission_add'],function(){
                Route::get('form',  'showRolePermissionForm')->name('admin.showRolePermissionForm'); // Display Role-Permission Data paga
                Route::post('add',  'storeRolePermission')->name('admin.storeRolePermission'); //This post route for add the RolePermissions
            });


            Route::group(['middleware' => 'check:role_permission_edit'],function(){
                Route::get('{id}/edit',  'editRolePermission')->name('admin.editRolePermission'); //This post route for add the RolePermissions
                Route::post('update/{id}',  'updateRolePermission')->name('admin.updateRolePermission'); //This post route for add the RolePermissions
            });


            Route::group(['middleware' => 'check:role_permission_delete'],function(){
                Route::delete('delete/{role_id}',  'deleteRolePermission')->name('admin.deleteRolePermission'); //This
            });
        });

        //University
        Route::prefix('university')->controller(UniversityController::class)->group(function(){
            Route::get('',  'index')->name('admin.showUniversity'); // Display University Data page
            Route::get('data/{id}',  'show')->name('admin.showUniversityDetails'); // Display University Data page

            Route::group(['middleware'=>'check:university_add'],function(){
                Route::get('form',  'showUniversityFrom')->name('admin.universityForm'); //this function for university form display
                Route::post('add',  'storeUniversity')->name('admin.storeUniversity'); //this function for university form display
            });

            Route::group(['middleware' => 'check:university_edit'],function(){
                Route::get('edit/{id}',  'editUniversity')->name('admin.editUniversity'); //This
                Route::post('update/{id}',  'updateUniversity')->name('admin.updateUniversity'); //This
            });

            Route::group(['middleware' => 'check:university_delete'],function(){
                Route::delete('delete/{id}',  'deleteData')->name('admin.deleteuniversity'); //This
            });
        });


        Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout'); //Admin can Logout Route
    });
});
