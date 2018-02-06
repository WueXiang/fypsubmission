<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Meetinglog;
use App\User;


class MeetinglogController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $meetinglogs = Meetinglog::latest()->paginate(20);

        return view('meetinglogs.index',compact('meetinglogs'))

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
        return view('meetinglogs.create')->with('lecturers', $lecturers);
        //original
        // return view('meetinglogs.create');

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

            'meetinglog' => 'required',
            'type' => 'required',
            'specialization' => 'required',
            'supervisor_id' => 'required',
            'co_supervisor_id' => 'nullable',
            'moderator_id' => 'nullable',

        ]);

        Meetinglog::create($request->all());

        return redirect()->route('meetinglogs.index')->with('success','Meetinglog created successfully');

    }


    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {
        $meetinglogs = Meetinglog::where('fyp_id','=',$id)->get();
        // $meetinglog = Meetinglog::find($id);

        return view('meetinglogs.show')->with('meetinglogs',$meetinglogs);
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
        
        $meetinglog = Meetinglog::find($id);
        return view('meetinglogs.edit',compact('meetinglog'))->with('lecturers', $lecturers);
        
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

            // 'meeting_date' => 'required|max:255',
            // 'work_done' => 'required|max:255',
            // 'work_to_be_done' => 'required|max:255',
            // 'problem_encountered' => 'max:255',
            // 'fyp_id' => 'required',
            'comment' => 'required',
        ]);

        Meetinglog::find($id)->update($request->all());

        $meetinglog = Meetinglog::find($id);

        return view('lecturer/meetinglogs/detail')->with('meetinglog',$meetinglog)->with('success','Comment updated successfully');

    }


    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        Meetinglog::find($id)->delete();

        return redirect()->route('meetinglogs.index')

                        ->with('success','Meetinglog deleted successfully');

    }

}