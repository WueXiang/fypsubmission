<?php

use Illuminate\Http\Request;
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

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/', function () {
    return view('main');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function(){
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
});

Route::prefix('lecturer')->group(function(){
    Route::get('/', 'LecturerController@index')->name('lecturer.dashboard');
    Route::get('/login', 'Auth\LecturerLoginController@showLoginForm')->name('lecturer.login');
    Route::post('/login', 'Auth\LecturerLoginController@login')->name('lecturer.login.submit');
});


//features
// Route::prefix('meetinglog')->group(function(){
    Route::get('/meetinglog', function () {
        $meetinglog = \App\meetinglog::all();
        return view('meetinglog')->with('meetinglog', $meetinglog);
    });

    Route::get('/new_meetinglog', function () {
        return view('new_meetinglog');
    });

    Route::post('/new_meetinglog', function (Request $request) {
        $data = $request->validate([
            'meeting_date' => 'required|max:255',
            'work_done' => 'required|max:255',
            'work_to_be_done' => 'required|max:255',
            'problem_encountered' => 'max:255'
        ]);

        $meetinglog = tap(new App\meetinglog($data))->save();

        return redirect('/meetinglog');
    });
// });

// Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('projects', 'ProjectsController@index')->name('projects.index');
// });
// Route::get('fileentry', 'FileEntryController@index');

// Route::get('fileentry/get/{filename}', [
//     'as' => 'getentry', 'uses' => 'FileEntryController@get']);

// Route::post('fileentry/add',[ 
//         'as' => 'addentry', 'uses' => 'FileEntryController@add']);

Route::get('/report', function () {
    return view('report');
});

Route::get('/upload', function () {
    return view('upload');
});

Route::post('upload', 'UploadController@upload');

Route::post('store','uploadController@store');
?>