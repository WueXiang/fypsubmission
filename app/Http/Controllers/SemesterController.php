<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Semester;
use App\User;


class SemesterController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $semesters = Semester::latest()->paginate(10);

        return view('semesters.index',compact('semesters'))

            ->with('i', (request()->input('page', 1) - 1) * 5);

    }


    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('semesters.create');
        //original
        // return view('semesters.create');

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

            'part' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',

        ]);

        Semester::create($request->all());

        return redirect()->route('semesters.index')->with('success','Semester created successfully');

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
        $semester = Semester::find($id);

        return view('semesters.show',compact('semester'))->with('students',$students);

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
        
        $semester = Semester::find($id);
        return view('semesters.edit',compact('semester'))->with('lecturers', $lecturers);
        
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

            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        Semester::find($id)->update($request->all());

        return view('admin')

                        ->with('success','Semester updated successfully');

    }


    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        Semester::find($id)->delete();

        return redirect()->back()->with('success','Semester deleted successfully');

    }

}