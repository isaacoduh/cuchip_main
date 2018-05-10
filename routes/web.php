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

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    // User Routes
    Route::get('/home', 'HomeController@index')->name('home');
    // Route::get('/casefiles/{user}/', 'CaseFileController@showAllCasefiles');
    Route::get('/casefiles/{client}/','CaseFileController@showAllCasefiles');
    // Route::get('/casefile/{casefile}/','CaseFileController@showCasefile');
    Route::get('/casefiles/{client}/casefile/{casefile}/',[
        'uses' => 'CaseFileController@showCasefile',
        'as' => 'casefiles.showsingle'
    ]);
    Route::get('/casefile/{casefile}',[
        'uses' => 'CaseFileController@showCasefile',
        'as' => 'casefiles.showsingle'
    ]);

    //Prescription Routes
    Route::post('casefile/{casefiles}/prescription',[
        'uses' => 'PrescriptionController@postNewPrescription',
        'as' => 'casefiles.prescriptions.create'
    ]);

    Route::get('casefile/{casefiles}/prescriptions/{prescriptions}/edit',[
        'uses' => 'PrescriptionController@getOnePrescription',
        'as' => 'casefiles.prescriptions'
    ]);

    Route::put('casefile/{casefiles}/prescriptions/{prescriptions}',[
        'uses' => 'PrescriptionController@updateOnePrescription'
    ]);

    Route::delete('casefiles/{casefiles}/prescriptions/{prescriptions}',[
        'uses' => 'PrescriptionController@deletePrescription'
    ]);

    Route::get('/logout','Auth\LoginController@logout');

    // Files Routes
    Route::post('casefile/{casefiles}/files/',[
        'uses' => 'FilesController@uploadAttachments',
        'as' => 'casefiles.files',
    ]);

    // Appointment Routes
    Route::post('casefile/{casefiles}/appointment',[
        'uses' => 'AppointmentController@setupAppointment',
        'as' => 'casefiles.appointments.create'
    ]);

    Route::get('casefile/{casefiles}/appointments/{appointments}/edit',[
        'uses' => 'AppointmentController@checkAppointment',
        'as' => 'casefiles.appointments'
    ]);

    Route::put('casefile/{casefiles}/appointments/{appointments}',[
    'uses' => 'AppointmentController@updateAppointment'
    ]);

    Route::delete('casefile/{casefiles}/appointments/{appointments}',[
        'uses' => 'AppointmentController@deleteAppointment'
    ]);

    // Admission Routes
    Route::post('casefile/{casefile}/admission',[
        'uses' => 'AdmissionController@setUpAdmission',
        'as' => 'casefiles.admissions.create'
    ]);

    Route::put('casefile/{casefile}/admissions/{admissions}',[
        'uses' => 'AdmissionController@dischargePatient'
    ]);

    // Comments Controller
    Route::post('casefile/{casefile}/comment', [
        'uses' => 'CommentController@postNewComment',
        'as'   => 'casefiles.comments.create',
        'middleware' => ['auth']
    ]);

    Route::get('casefile/{casefile}/comments/{comments}/edit',[
        'uses' => 'CommentController@getOneComment',
        'as' => 'casefiles.comments'
    ]);

    Route::put('casefile/{casefile}/comments/{comments}',[
        'uses' => 'CommentController@updateOneComment'
    ]);

    Route::delete('casefile/{casefile}/comments/{comments}',[
        'uses' => 'CommentController@deleteOneComment',
    ]);

});

// User Routes
Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/casefiles/{user}/', 'CaseFileController@showAllCasefiles');
Route::get('/logout','Auth\LoginController@logout');


Route::group(['middleware' => 'client_guest'], function(){
    Route::get('clientregister','ClientAuth\RegisterController@showRegistrationForm');
    Route::post('clientregister','ClientAuth\RegisterController@register');
    Route::get('clientlogin', 'ClientAuth\LoginController@showLoginForm');
    Route::post('clientlogin', 'ClientAuth\LoginController@login');

    //password reset routes
    Route::get('clientpassword/reset', 'ClientAuth\ForgotPasswordController@showLinkRequestForm');
    Route::post('clientpassword/email', 'ClientAuth\ForgotPasswordController@sendResetLinkEmail');
    // Route::get('clientpassword/reset/{token}','ClientAuth\ResetPasswordController@showResetForm');
    // Route::post('clientpassword/reset', 'ClientAuth\ResetPasswordController@reset');

});

//only logged in clients can access or send requests to these pages
Route::group(['middleware' => 'client_auth'], function(){
    // Route::post('clientlogout', 'ClientAuth\LoginController@logout');
    Route::get('/clientlogout','ClientAuth\LoginController@logout');
    Route::get('/clientdashboard', function(){
        return view('client.dashboard');
    });
    
    Route::get('/clientdashboard', 'ClientController@index');
    Route::get('/clientprofile','ClientController@details');
    //users/

    // Casefile Routes
    Route::get('/client/casefiles/','CaseFileController@index');
    Route::get('/client/casefiles/',[
        'uses' => 'CaseFileController@index',
        'as' => 'client.casefiles.index',
    ]);

    Route::get('/client/casefiles/{casefile}','CaseFileController@show');
    Route::get('/client/newcasefile/','CaseFileController@create');
    Route::post('/client/newcasefile/',[
        'uses' => 'CaseFileController@store',
        'as' => 'client.casefile.store',
    ]);

    //Birthcase Routes 
    Route::get('/client/birthcases/','BirthCaseController@clienthome');
    Route::get('/client/birthcases/',[
        'uses' => 'BirthCaseController@clienthome',
        'as' => 'client.birthcase.index',
    ]);
    Route::get('/client/birthcase/new/','BirthCaseController@clientcreate');
    Route::post('/client/birthcase/new',[
        'uses' => 'BirthCaseController@clientstore',
        'as' => 'client.birthcase.store',
    ]);

    Route::get('/client/birthcases/{birthcase}','BirthCaseController@clientshow');

    // vaccination
    Route::post('/client/birthcase/{birthcase}/',[
        'uses' => 'VaccinationController@clientstore',
        'as' => 'client.vaccination.store',
    ]);
    //vaccination report
    Route::get('/client/birthcases/{birthcase}/report','BirthCaseController@vaccinationreport');
    
    Route::post('/client/birthcase/{birthcase}/vaccination',[
        'uses' => 'VaccinationDetailController@addVaccination',
        'as' => 'birthcase.vaccinations.create',
    ]);
    // Route::resource('casefiles','CaseFileController');
    // Route::get('/casefiles','CaseFileController@index');
    // Route::get('/casefiles/{casefile}','CaseFileController@show');

    Route::group(['prefix' => 'client/'], function(){
        Route::get('users','ClientController@showUsers');
        Route::get('user/create','ClientController@createUserForm');
        Route::post('user/create','ClientController@storeUser');
    });
});

// The Routes for the Quick Reference Tool
// Home Page for General Users
Route::get('/guide','GuideController@index');
Route::get('/guide/courses/{course}/',[
    'uses' => 'CourseController@showCourse',
    'as' => 'guide.courses.show'
]);

Route::get('/guide/courses/{course}/topics/{topic}','TopicController@showTopic');


//Home Page for console management.
Route::get('/guide/console/','GuideController@consolehome');
Route::get('/guide/console/',[
    'uses' => 'GuideController@consolehome',
    'as' => 'guide.console.index'
]);
Route::get('/guide/console/newcourses','CourseController@create');
Route::post('/guide/console/newcourses',[
    'uses' => 'CourseController@store',
    'as' => 'guide.course.store'
]);

Route::get('/guide/console/courses/{course}/',[
    'uses' => 'CourseController@show',
    'as' => 'guide.course.show'
]);
Route::get('/guide/console/course/{course}/topics/newtopic','TopicController@create');
Route::post('/guide/console/course/{course}/topics/newtopic',[
    'uses' => 'TopicController@store',
    'as' => 'guide.topic.store'
]);
Route::get('/guide/console/courses/{course}/topics/{topic}','TopicController@show');

Route::post('/guide/console/courses/{course}/topics/{topic}/notes/add',[
    'uses' => 'NoteController@addNote',
    'as' => 'guide.note.store',
]);

Route::post('/guide/console/courses/{course}/topics/{topic}/materials/add',[
    'uses' => 'MaterialController@addMaterial',
    'as' => 'guide.material.store',
]);

// Vaccination Bants
Route::resource('vaccines','VaccineController');
