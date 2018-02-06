<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Report;
use App\Fyppart;
use App\User;


class ReportController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $reports = Report::latest()->paginate(10);

        return view('reports.index',compact('reports'))

            ->with('i', (request()->input('page', 1) - 1) * 5);

    }


    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        $lecturers = \DB::table('users')->where('lecturer', '=', '1')->pluck('name','id');
        return view('reports.create')->with('lecturers', $lecturers);
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

        request()->validate([

            'report' => 'required',
            'type' => 'required',
            'specialization' => 'required',
            'supervisor_id' => 'required',
            'co_supervisor_id' => 'nullable',
            'moderator_id' => 'nullable',

        ]);

        Report::create($request->all());

        return redirect()->route('reports.index')->with('success','Report created successfully');

    }


    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {
        $students = User::where('student','=','1')->pluck('name','id');
        $report = Report::find($id);

        return view('reports.show',compact('report'))->with('students',$students);

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