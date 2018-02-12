<?php

use Illuminate\Http\Request;

use App\Title;
use App\Report;
use App\PlagiarismReport;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/rollback', 'HomeController@rollback')->name('rollback');
Route::get('/present', 'HomeController@present')->name('present');
// Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function(){
    Route::get('titles', function () {
        return view('titles');
    });


});

// Route::prefix('lecturer')->group(function(){
    // Route::get('/', 'LecturerController@index')->name('lecturer.dashboard');
    // Route::get('/login', 'Auth\LecturerLoginController@showLoginForm')->name('lecturer.login');
    // Route::post('/login', 'Auth\LecturerLoginController@login')->name('lecturer.login.submit');
    Route::get('lecturer', function () {
        return view('lecturer');
    });
    Route::get('lecturer/supervisor', function () {
        $titles=App\Title::where("supervisor_id", "=", Auth::id())->get();
        return view('titles/index')->with('titles',$titles);
    });
    Route::get('lecturer/moderator', function () {
        $titles=App\Title::where("moderator_id", "=", Auth::id())->get();
        return view('titles/index')->with('titles',$titles);
    });

    Route::get('/lecturer/report', function () {
        return view('report');
    });

    // Route::resource('titles','TitleController');
// });

Route::prefix('student')->group(function(){
    Route::get('/', function () {
        return view('student');
    });
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

    Route::get('title/show', function () {
        return view('student/titles/show');
    });
    Route::get('/report', function () {
        return view('student/report');
    });

    
});

Route::resource('semesters','SemesterController');

Route::resource('titles','TitleController');

Route::resource('users','UserController');

Route::resource('fyps','FypController');

Route::resource('meetinglogs','MeetinglogController');

Route::resource('reports','ReportController');

Route::resource('plagiarismreports','PlagiarismReportController');

Route::get('/index/{id}', function ($id) {
    $meetinglog = \App\Meetinglog::where('id', '=', $id)->first();
    return view('lecturer/meetinglogs/detail')->with('meetinglog', $meetinglog);
});

Route::get('/report/{id}', function ($id) {
    $fyppart = \App\Fyppart::where('id', '=', $id)->first();
    $report = \App\Report::where('fyp_id', '=', $id)->first();
    return view('lecturer/report')->with('fyppart', $fyppart)->with('report', $report);
});

Route::get('/plagiarismreport/{id}', function ($id) {
    // exit($id);
    $fyppart = \App\Fyppart::where('id', '=', $id)->first();
    // $plagiarismreport = \App\PlagiarismReport::where('fyp_id', '=', $id)->first();
    return view('lecturer/plagiarismreport')->with('fyppart', $fyppart);
    // ->with('plagiarismreport', $plagiarismreport);
    // exit('no problem yet');
})->name('plagiarismreport');

Route::get('/report_download/{id}', function ($id) {   
    $path = 'D:\\xampp\\htdocs\\fypsubmission\\public\\'.$id.'report.pdf';
    return response()->download($path);
});

Route::get('/plagiarismreport_download/{id}', function ($id) {   
    $path = 'D:\\xampp\\htdocs\\fypsubmission\\public\\'.$id.'plagiarismreport.pdf';
    return response()->download($path);
});

// Route::post('plagiarismreport/', function (Request $request) {

//         $fyppart = App\Fyppart::where("fyp_id", "=", $request->fyppart_id)->first();
//         // exit($request->fyppart_id);
//         $file=request()->file('file');
//         $filename = $file->getClientOriginalName();
//         // $ext=$file->guessClientExtension();
//         // $file->storeAs('uploads/'.$fyp_id,"report.pdf");
//         $ext = pathinfo($filename, PATHINFO_EXTENSION);
//         $destination = '/plagiarismreports/';
//         $codename= ''.$fyppart->id.'.pdf';
//         $allowed= array('pdf');
//         if( ! in_array( $ext, $allowed ) ) {
//             echo 'File format error: Only support pdf format.';
//         }
//         else{
//             // echo '<img src= "uploads/'.$file->getClientOriginalName().'"/>';
//             $file->move($destination, $codename);
//             $request->request->add(['filename' => $codename]);
//             $request->request->add(['fyp_id' => $fyppart->id]);
//             // $request->request->add(['id' => $fyppart->id]);
            
//             $data = $request->validate([
//                 // 'id' => 'required',
//                 'fyp_id' => 'required',
//                 'filename'=>'required',
//             ]);
//             // $report = App\Report::updateOrCreate(['id' => $fyppart->id]);
//             $save = tap(new App\PlagiarismReport($data))->save();

//             $plagiarismreport = \App\PlagiarismReport::where('fyp_id', '=', $id)->first();
//             return view('lecturer/plagiarismreport')->with('fyppart', $fyppart)->with('plagiarismreport', $plagiarismreport);
//                 }
//     });

// Route::get('/titles/fyp/{id}', function ($id) {
//     exit($id);
//     return view('lecturer/fyp_main')->with('fyp_id',$fyp_id);
// });

// Route::prefix('titles')->group(function(){
    
    // Route::get('title/create', function () {
    //     return view('titles/create');
    // });
    // Route::get('/', 'ProjectsController@index')->name('projects.index');
    // Route::get('/detail/{id}', function ($id) {
    //     $project = \App\Project::where('id', '=', $id)->get();
    //     return view('projects/detail')->with('project', $project[0]);
// });
Route::get('protected', ['middleware' => ['auth', 'admin'], function() {
    return Auth::user()->isAdmin();
}]);


// Route::get('/upload', function () {
//     return view('upload');
// });

// Route::post('upload', 'UploadController@upload');

// Route::post('store','uploadController@store');



    // return back();

        
    //     return redirect('/upload');
    

?>