<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['prefix' => 'developer'],function (){

    Route::get('prueba/api','PruebaApiController@index')->name('developer.prueba.api');

    Route::get('passport/clients', 'PassportClientsController@index')->name('passport.clients');

});


Route::get('login/{driver}', 'Auth\LoginController@redirectToProvider')->name('social_auth');
Route::get('login/{driver}/callback', 'Auth\LoginController@handleProviderCallback');


Route::group(['middleware' => 'auth'],function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/contact', 'HomeController@contact')->name('contact');
    Route::get('/calendar', 'HomeController@calendar')->name('calendar');


    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::patch('profile/{user}', 'ProfileController@update')->name('profile.update');
    Route::post('profile/{user}/edit/avatar', 'ProfileController@editAvatar')->name('profile.edit.avatar');

    Route::resource('users', 'UserController');
    Route::get('user/{user}/menu', 'UserController@menu')->name('user.menu');;
    Route::patch('user/menu/{user}', 'UserController@menuStore')->name('users.menuStore');

    Route::get('option/create/{option}', 'OptionController@create')->name('option.create');
    Route::get('option/orden', 'OptionController@updateOrden')->name('option.order.store');
    Route::resource('options',"OptionController");

    Route::resource('roles', 'RoleController');

    Route::resource('permissions', 'PermissionController');

    Route::resource('configurations', 'ConfigurationController');


    Route::resource('pacientes', 'PacienteController');

    Route::get('get/data/paciente', 'PacienteController@getPacientePorApi')->name('get.datos.paciente');

    Route::resource('remas', 'RemaController');

    Route::resource('pacienteAtencions', 'PacienteAtencionController');

    Route::resource('pacientePrevisions', 'PacientePrevisionController');

    Route::resource('drogas', 'DrogaController');
    Route::get('drogas/imprime/{droga}', 'DrogaController@imprimeEtiqueta')->name('drogas.imprimir');

});



Route::get('print',function (){

    $fecha = \Carbon\Carbon::now()->format('d/m/Y');
    $primer_nombre = "Felipe";
    $segundo_nombre = "Pino";
    $apellido_paterno = "Ojeda";
    $apellido_materno = "bilches";
    $runcomp ="123456";
    $id_aten= "5555";
    $run= "12345";

        $print_data = "^XA
                    ^LH0,0
                    ^FO4,2
                    ^GB804,798,4
                    ^FS
                    ^FO4,2 ^GB548,52,4 
                    ^FS ^FO19,12 ^ADN,36,20
                    ^FDHospital Naval A.Nef ^FS ^FO548,2 ^GB260,52,4

                    ^FS ^FO611,16
                    ^ADN,36,10 ^FD1:3
                    ^FO21,100 ^ADN,15,15 ^FR ^FDNombre:
                    ^FS
                    ^FO321,100
                    ^ADN,25,15 ^FR ^FDCLARISA BERNAL MOYA

                    
                    ^FS 
                    ^FO21,130 ^ADN,15,15 ^FR ^FDRut:
                    ^FS
                    ^FO321,130
                    ^ADN,25,15 ^FR ^FD5.628.925-9

                    ^FS 
                    ^FO21,160 ^ADN,15,15 ^FR ^FDFecha Adm:
                    ^FS
                    ^FO321,160
                    ^ADN,25,15 ^FR ^FD05/02/2021

                    ^FS 
                    ^FO21,190 ^ADN,15,15 ^FR ^FDDroga:
                    ^FS
                    ^FO321,190
                    ^ADN,25,15 ^FR ^FDBORTEZOMIB 2,2MG

                    ^FS 
                    ^FO21,220 ^ADN,15,15 ^FR ^FDVol. Total:
                    ^FS
                    ^FO321,220
                    ^ADN,25,15 ^FR ^FD0.88 ML

                    ^FS 
                    ^FO21,250 
                    ^ADN,25,15 ^FR ^FDEsquema:
                    ^FS
                    ^FO231,250
                    ^ADN,25,10 ^FR ^FDBortez sem

                    ^FS 
                    ^FO381,250 ^ADN,15,10 ^FR ^FDCiclo:
                    ^FS
                    ^FO461,250
                    ^ADN,15,10 ^FR ^FD2

                    ^FS 
                    ^FO501,250 ^ADN,15,10 ^FR ^FDDia:
                    ^FS
                    ^FO560,250
                    ^ADN,15,10 ^FR ^FD8 (1,8, 15, 21)

                    ^FS 
                    ^FO21,280 ^ADN,15,15 ^FR ^FDFecha Elab:
                    ^FS
                    ^FO321,280
                    ^ADN,15,10 ^FR ^FD05/05/2021 (vigente 8 hrs) hasta 18 hrs

                    ^FS 
                    ^FO21,310 ^ADN,15,10 ^FR ^FDProteger de Luz:
                    ^FS
                    ^FO211,310
                    ^ADN,15,10 ^FR ^FDSi

                    ^FS 
                    ^FO321,310 ^ADN,15,10 ^FR ^FDRefrigerar:
                    ^FS
                    ^FO451,310
                    ^ADN,15,10 ^FR ^FDNo

                      ^FS
                    ^XZ";

    // dd($print_data);

    try {
        $fp = pfsockopen("172.25.34.88", 9100);
        fputs($fp, $print_data);
        fclose($fp);

        echo 'Successfully Printed';
    } catch (Exception $e) {
        echo 'Caught exception: ', $e->getMessage(), "\n";
    }
});
