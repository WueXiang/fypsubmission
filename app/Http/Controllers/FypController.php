<?php



namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Fyp;
use App\Fyppart;
use App\Title;
use App\User;
use DB;

class FypController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $fyps = Fyp::latest()->paginate(20);

        return view('fyps.index',compact('fyps'))

            ->with('i', (request()->input('page', 1) - 1) * 5);

    }


    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        $students = \DB::table('users')->where('student', '=', '1')->pluck('id');
        $title = \DB::table('titles')->where('id', '=', $id )->first();
        return view('fyps.create')->with('students', $students)->with('title', $title);
        //original
        // return view('fyps.create');

    }


    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {
        $student_id = $request->student_id;
        $title_id = $request->title_id;

        $request->request->add(['id' => $title_id.$student_id]);

        request()->validate([

            'id' => 'required',
            'student_id' => 'required',
            'title_id' => 'required',
        ]);

        Fyp::create($request->all());



        DB::table('fypparts')->insert(
        [
            'id' => $title_id.$student_id.'1',
            'fyp_id' => $title_id.$student_id,
            'part' => '1',
        ]);

        DB::table('fypparts')->insert(
        [
            'id' => $title_id.$student_id.'2',
            'fyp_id' => $title_id.$student_id,
            'part' => '2',
        ]);

        // return redirect()->route('fyps.index')->with('success','Student enrolled for project successfully');
        $students = User::where('student','=','1')->pluck('name','id');
        $title = Title::find($title_id);

        return view('titles.show',compact('title'))->with('success','Student enrolled for project successfully')->with('students',$students);
    }


    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        $fyp = Fyp::find($id);

        return view('fyps.show',compact('fyp'));

    }

    public function show_meetinglog($id)

    {

        $fyp = Fyp::find($id);

        return view('fyps.show_meetinglog',compact('fyp'));

    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {
        
        $students = \DB::table('users')->where('student', '=', '1')->pluck('id');
        $fyp = Fyp::find($id);
        return view('fyps.edit',compact('fyp'))->with('students', $students);

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

            'student' => 'required',
            'title_id' => 'required',
        ]);

        Fyp::find($id)->update($request->all());

        return redirect()->route('fyps.index')

                        ->with('success','Fyp updated successfully');

    }


    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        Fyp::find($id)->delete();

        return redirect()->route('fyps.index')

                        ->with('success','Student removed from project successfully');

    }

}