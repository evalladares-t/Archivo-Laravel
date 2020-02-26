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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

//)->middleware(['auth','permission:1']);;
Auth::routes();

Route::middleware('auth')->group(function () {
    
    //Crudo gestión de perfiles
        //Listar Perfiles
        Route::get('/operationsp', 'operations\OperationsPController@indexP')->name('operationsp')->middleware('permission:1');   
        //Agregar en la bd un perfil
        Route::post('/operationsp', 'operations\OperationsPController@storeP')->name('operationsp')->middleware('permission:1');   
        //Eliminar un registro perfil en la bd
        Route::POST('/operationsp/{id}/delete', 'operations\OperationsPController@destroyP')->name('operationsp')->middleware('permission:1');
        //Info de un registro perfil de la bd 
        Route::post('/operationsp/{id}/info', 'operations\OperationsPController@infoP')->name('operationsp')->middleware('permission:1');
        //Llevar al formulario que se va a actualizar
        Route::POST('/operationsp/{id}/edit', 'operations\OperationsPController@editP')->name('operationsp')->middleware('permission:1');
        //Actualizar el perfil en la base de datos
        Route::POST('/operationsp/{id}/update', 'operations\OperationsPController@updateP')->name('operationsp')->middleware('permission:1');
    
    
    //Crudo gestión de usuarios
        //Listar Usuarios
        Route::get('/operationsu', 'operations\OperationsUController@indexU')->name('operationsu')->middleware('permission:2');
        //Agregar en la bd un usuario a la bd
        Route::post('/operationsu', 'operations\OperationsUController@storeU')->name('operationsu')->middleware('permission:2');
        //Eliminar un registro perfil en la bd
        Route::POST('/operationsu/{id}/delete', 'operations\OperationsUController@destroyU')->name('operationsu')->middleware('permission:2');
        //Info de un registro perfil de la bd 
        Route::post('/operationsu/{id}/info', 'operations\OperationsUController@infoU')->name('operationsu')->middleware('permission:2');
        //Llevar al formulario que se va a actualizar
        Route::POST('/operationsu/{id}/edit', 'operations\OperationsUController@editU')->name('operationsu')->middleware('permission:2');
        //Actualizar el perfil en la base de datos
        Route::POST('/operationsu/{id}/update', 'operations\OperationsUController@updateU')->name('operationsu')->middleware('permission:2');

    //Crudo Mantenimiento Ubicación Topográfica
        //Estante
            //Dashboard de Mantenimiento
            Route::get('/mantenimientos', 'Mantenientos\ManUbicacionTopController@indexM')->name('mantenimientos')->middleware('permission:14');
            //Agregar en la bd estante
            Route::post('/mantenimientosUTnew', 'Mantenientos\ManUbicacionTopController@storeME')->name('mantenimientos')->middleware('permission:14');
            //Eliminar un registro perfil en la bd
            Route::POST('/mantenimientosUT/{id}/delete', 'Mantenientos\ManUbicacionTopController@destroyShelf')->name('mantenimientos')->middleware('permission:14');        
            //Llevar al formulario que se va a actualizar
            Route::POST('/mantenimientosUT/{id}/edit', 'Mantenientos\ManUbicacionTopController@editShelf')->name('mantenimientos')->middleware('permission:14');
            //Actualizar el perfil en la base de datos
            Route::POST('/mantenimientosUT/{id}/update', 'Mantenientos\ManUbicacionTopController@updateShelf')->name('mantenimientos')->middleware('permission:14');
        //Estante
            //Agregar en la bd estante*/
            Route::post('/mantenimientosCTnew', 'Mantenientos\ManUbicacionTopController@storeCT')->name('mantenimientos')->middleware('permission:14');
            //Eliminar un registro perfil en la bd
            Route::POST('/mantenimientosCTnew/{id}/delete', 'Mantenientos\ManUbicacionTopController@destroyCT')->name('mantenimientos')->middleware('permission:14');        
            //Llevar al formulario que se va a actualizar
            Route::POST('/mantenimientosCTnew/{id}/edit', 'Mantenientos\ManUbicacionTopController@editCT')->name('mantenimientos')->middleware('permission:14');
            //Actualizar el perfil en la base de datos
            Route::POST('/mantenimientosCTnew/{id}/update', 'Mantenientos\ManUbicacionTopController@updateCT')->name('mantenimientos')->middleware('permission:14');

    //Crudo Mantenimiento Secciones Documentales
        //Seccion
            //Dashboard de Mantenimiento
            Route::get('/mantenimientosSD', 'Mantenientos\ManSDocumentalesController@indexSD')->name('mantenimientos')->middleware('permission:15');
            //Agregar en la bd estante
            Route::post('/mantenimientosSDSs', 'Mantenientos\ManSDocumentalesController@storeSDS')->name('mantenimientos')->middleware('permission:14');
            //Eliminar un registro perfil en la bd
            Route::POST('/mantenimientosSDSs/{id}/delete', 'Mantenientos\ManSDocumentalesController@destroySection')->name('mantenimientos')->middleware('permission:14');        
            //Llevar al formulario que se va a actualizar
            Route::POST('/mantenimientosSDSs/{id}/edit', 'Mantenientos\ManSDocumentalesController@editSection')->name('mantenimientos')->middleware('permission:14');
            //Actualizar el perfil en la base de datos
            Route::POST('/mantenimientosSDSs/{id}/update', 'Mantenientos\ManSDocumentalesController@updateSection')->name('mantenimientos')->middleware('permission:14');
        //Sub-seccion
            //Agregar en la bd estante
            Route::post('/mantenimientosSDSb', 'Mantenientos\ManSDocumentalesController@storeSubsection')->name('mantenimientos')->middleware('permission:14');
            //Eliminar un registro perfil en la bd
            Route::POST('/mantenimientosSDSb/{id}/delete', 'Mantenientos\ManSDocumentalesController@destroySubsection')->name('mantenimientos')->middleware('permission:14');        
            //Llevar al formulario que se va a actualizar
            Route::POST('/mantenimientosSDSb/{id}/edit', 'Mantenientos\ManSDocumentalesController@editSubsection')->name('mantenimientos')->middleware('permission:14');
            //Actualizar el perfil en la base de datos
            Route::POST('/mantenimientosSDSb/{id}/update', 'Mantenientos\ManSDocumentalesController@updateSubsection')->name('mantenimientos')->middleware('permission:14');
    
    //Crudo Mantenimiento Series Documentales
        //Serie
            //Dashboard de Mantenimiento
            Route::get('/mantenimientosSerD', 'Mantenientos\ManSerDocumentalController@indexSerD')->name('mantenimientos')->middleware('permission:15');
            //Agregar en la bd estante
            Route::post('/mantenimientosSerD', 'Mantenientos\ManSerDocumentalController@storeSDS')->name('mantenimientos')->middleware('permission:14');
            //Eliminar un registro perfil en la bd
            Route::POST('/mantenimientosSerD/{id}/delete', 'Mantenientos\ManSerDocumentalController@destroySection')->name('mantenimientos')->middleware('permission:14');        
            //Llevar al formulario que se va a actualizar
            Route::POST('/mantenimientosSerD/{id}/edit', 'Mantenientos\ManSerDocumentalController@editSection')->name('mantenimientos')->middleware('permission:14');
            //Actualizar el perfil en la base de datos
            Route::POST('/mantenimientosSerD/{id}/update', 'Mantenientos\ManSerDocumentalController@updateSection')->name('mantenimientos')->middleware('permission:14');
        
            /*//Sub-serie
            //Agregar en la bd estante
            Route::post('/mantenimientosSDSb', 'Mantenientos\ManSerDocumentalController@storeSubsection')->name('mantenimientos')->middleware('permission:14');
            //Eliminar un registro perfil en la bd
            Route::POST('/mantenimientosSDSb/{id}/delete', 'Mantenientos\ManSerDocumentalController@destroySubsection')->name('mantenimientos')->middleware('permission:14');        
            //Llevar al formulario que se va a actualizar
            Route::POST('/mantenimientosSDSb/{id}/edit', 'Mantenientos\ManSerDocumentalController@editSubsection')->name('mantenimientos')->middleware('permission:14');
            //Actualizar el perfil en la base de datos
            Route::POST('/mantenimientosSDSb/{id}/update', 'Mantenientos\ManSerDocumentalController@updateSubsection')->name('mantenimientos')->middleware('permission:14');*/


});
