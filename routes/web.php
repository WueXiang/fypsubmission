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
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function(){
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

Route::prefix('lecturer')->group(function(){
    Route::get('/', 'LecturerController@index')->name('lecturer.dashboard');
    Route::get('/login', 'Auth\LecturerLoginController@showLoginForm')->name('lecturer.login');
    Route::post('/login', 'Auth\LecturerLoginController@login')->name('lecturer.login.submit');
    Route::get('/report', function () {
        return view('report');
    });
});


//features
Route::prefix('student')->group(function(){
    Route::prefix('meetinglog')->group(function(){
        Route::get('/', function () {
            $meetinglog = \App\Meetinglog::all();
            return view('student/meetinglogs/index')->with('meetinglog', $meetinglog);
        });
        Route::get('/index/{id}', function ($id) {
            $meetinglog = \App\Meetinglog::where('id', '=', $id)->get();
            // echo $meetinglog[0]->id;
            return view('student/meetinglogs/detail')->with('meetinglog', $meetinglog[0]);
        });
        Route::get('/create', function () {
            return view('student/meetinglogs/create');
        });
        Route::post('/create', function (Request $request) {
            // $user = App\User::find(Auth::user()->id);
            // $fyp = App\Fyp::where("student_id", "=", $user->id)->first();
            // $fyp_id = App\Fyppart::select('fyp_id')->where("fyp_id", "=", $fyp->id)->first();
            // $request->request->add(['fyp_id' => $fyp_id]);
            $data = $request->validate([
                'meeting_date' => 'required|max:255',
                'work_done' => 'required|max:255',
                'work_to_be_done' => 'required|max:255',
                'problem_encountered' => 'max:255',
                'fyp_id' => 'required'
            ]);
            $meetinglog = tap(new App\meetinglog($data))->save();
            return redirect('student/meetinglog/');
        });
    });
    Route::resource('titles','TitleController');
    Route::get('title/show', function () {
        return view('student/titles/show');
    });
    Route::get('/report', function () {
        return view('student/report');
    });
    Route::post('new_report', function (Request $request) {

        $user = App\User::find(Auth::user()->id);
        $fyp = App\Fyp::where("student_id", "=", $user->id)->first();
        $fyppart = App\Fyppart::where("fyp_id", "=", $fyp->id)->first();
        $file=request()->file('file');
        $filename = $file->getClientOriginalName();
        // $ext=$file->guessClientExtension();
        // $file->storeAs('uploads/'.$fyp_id,"report.pdf");
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $destination = 'student/reports/';
        $codename= ''.$fyppart->id.'.pdf';
        $allowed= array('pdf');
        if( ! in_array( $ext, $allowed ) ) {
            echo 'File format error: Only support pdf format.';
        }
        else{
            // echo '<img src= "uploads/'.$file->getClientOriginalName().'"/>';
            $file->move($destination, $codename);
            $request->request->add(['filename' => $codename]);
            $request->request->add(['original_filename' => $filename]);
            $request->request->add(['fyp_id' => $fyppart->id]);
            $data = $request->validate([
                'fyp_id' => 'required',
                'filename'=>'required',
                'original_filename'=>'required',
            ]);
            $report = tap(new App\Report($data))->save();
            return redirect('student/report');
        }
    });

    Route::post('/report_download', function (Request $request) {   
        $path = 'D:\\xampp\\htdocs\\fypsubmission\\public\\reports\\'.$fyppart_id->id.'.'.$ext.'';
        return response()->download($path);
    });
});

// Route::prefix('titles')->group(function(){
    
    // Route::get('title/create', function () {
    //     return view('titles/create');
    // });
    // Route::get('/', 'ProjectsController@index')->name('projects.index');
    // Route::get('/detail/{id}', function ($id) {
    //     $project = \App\Project::where('id', '=', $id)->get();
    //     return view('projects/detail')->with('project', $project[0]);
// });



Route::get('/upload', function () {
    return view('upload');
});

Route::post('upload', 'UploadController@upload');

Route::post('store','uploadController@store');



    // return back();

        
    //     return redirect('/upload');
    

?>