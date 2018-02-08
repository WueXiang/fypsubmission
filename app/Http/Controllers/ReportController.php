<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Report;
use App\Fyp;
use App\Fyppart;
use App\User;
use Auth;


class ReportController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $fyps = Fyp::all();

        return view('reports.index',compact('fyps'))

            ->with('i', (request()->input('page', 1) - 1) * 5);

    }


    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('reports.create');
        //original
        // return view('reports.create');

    }


    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {   
        // exit('something happened');
        $fyppart_id = $request->fyppart_id;
        $file=request()->file('file');
        $filename = $file->getClientOriginalName();
        // $ext=$file->guessClientExtension();
        // $file->storeAs('uploads/'.$fyp_id,"report.pdf");
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        // $destination = '/';
        $codename= ''.$fyppart_id.'report.pdf';
        $allowed= array('pdf');
        if( ! in_array( $ext, $allowed ) ) {
            echo 'File format error: Only support pdf format.';
        }
        else{
            // echo '<img src= "uploads/'.$file->getClientOriginalName().'"/>';
            // exit(public_path());
            $file->move(public_path(), $codename);
            $request->request->add(['filename' => $codename]);
            $request->request->add(['fyp_id' => $fyppart_id]);
            // $request->request->add(['id' => $fyppart->id]);
            
            $data = $request->validate([
                // 'id' => 'required',
                'fyp_id' => 'required',
                'filename'=>'required',
            ]);
            // $report = App\Report::updateOrCreate(['id' => $fyppart->id]);
            $report = tap(new Report($data))->save();

            return redirect()->route('reports.create')->with('success','Report created successfully');
        }
    }


    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {
        // $students = User::where('student','=','1')->pluck('name','id');
        // $report = Report::find($id);

        // return view('reports.show',compact('report'))->with('students',$students);

    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {
        $lecturers = \DB::table('users')->where('lecturer', '=', '1')->pluck('name','id');
        
        $report = Report::find($id);
        return view('reports.edit',compact('report'))->with('lecturers', $lecturers);
        
    }


    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, $id)

    {

        request()->validate([

            'comment' => 'required',
        ]);

        Report::find($id)->update($request->all());

        $report = Report::find($id);
        $fyppart = Fyppart::where('id','=',$report->fyp_id)->first();

        return view('lecturer/report')->with('report',$report)->with('fyppart',$fyppart)->with('success','Comment updated successfully');

    }


    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        Report::find($id)->delete();

        return redirect()->route('reports.index')

                        ->with('success','Report deleted successfully');

    }

}