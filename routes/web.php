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
Route::prefix('meetinglog')->group(function(){
    Route::get('/', function () {
        $meetinglog = \App\Meetinglog::all();
        return view('meetinglogs/index')->with('meetinglog', $meetinglog);
    });
    Route::get('/index/{id}', function ($id) {
        $meetinglog = \App\Meetinglog::where('id', '=', $id)->get();
        // echo $meetinglog[0]->id;
        return view('meetinglogs/detail')->with('meetinglog', $meetinglog[0]);
    });
    Route::get('/create', function () {
        return view('meetinglogs/create');
    });
    Route::post('/create', function (Request $request) {
        $data = $request->validate([
            'meeting_date' => 'required|max:255',
            'work_done' => 'required|max:255',
            'work_to_be_done' => 'required|max:255',
            'problem_encountered' => 'max:255'
        ]);
        $meetinglog = tap(new App\meetinglog($data))->save();
        return redirect('/meetinglog/');
    });
});

Route::prefix('project')->group(function(){
    Route::get('/', 'ProjectsController@index')->name('projects.index');
    Route::get('/detail/{id}', function ($id) {
        $project = \App\Project::where('id', '=', $id)->get();
        return view('projects/detail')->with('project', $project[0]);
    });
    // Route::get('fileentry', 'FileEntryController@index');

// Route::get('fileentry/get/{filename}', [
//     'as' => 'getentry', 'uses' => 'FileEntryController@get']);

// Route::post('fileentry/add',[ 
//         'as' => 'addentry', 'uses' => 'FileEntryController@add']);
});

Route::get('/report', function () {
    return view('report');
});

Route::get('/upload', function () {
    return view('upload');
});

Route::post('upload', 'UploadController@upload');

Route::post('store','uploadController@store');
?>