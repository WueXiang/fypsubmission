<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\PlagiarismReport;
use App\Fyp;
use App\Fyppart;
use App\User;
use Auth;


class PlagiarismReportController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        // $plagiarismreports = PlagiarismReport::latest()->paginate(10);

        // return view('plagiarismreports.index',compact('plagiarismreports'))

        //     ->with('i', (request()->input('page', 1) - 1) * 5);

    }


    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('plagiarismreports.create');
        //original
        // return view('plagiarismreports.create');

    }


    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {   
        // exit($request->fyppart_id);

        $fyppart = Fyppart::where("fyp_id", "=", $request->fyppart_id)->first();
        $file=request()->file('file');
        $filename = $file->getClientOriginalName();
        // $ext=$file->guessClientExtension();
        // $file->storeAs('uploads/'.$fyp_id,"plagiarismreport.pdf");
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        // $destination = '/';
        $codename= ''.$fyppart->id.'plagiarismreport.pdf';
        $allowed= array('pdf');
        if( ! in_array( $ext, $allowed ) ) {
            echo 'File format error: Only support pdf format.';
        }
        else{
            // echo '<img src= "uploads/'.$file->getClientOriginalName().'"/>';
            $file->move(public_path(), $codename);
            $request->request->add(['filename' => $codename]);
            $request->request->add(['fyp_id' => $fyppart->id]);
            // $request->request->add(['id' => $fyppart->id]);
            
            $data = $request->validate([
                // 'id' => 'required',
                'fyp_id' => 'required',
                'filename'=>'required',
            ]);
            // $plagiarismreport = App\PlagiarismReport::updateOrCreate(['id' => $fyppart->id]);
            $plagiarismreport = tap(new PlagiarismReport($data))->save();

            return view('lecturer/plagiarismreport')->with('fyppart',$fyppart)->with('success','PlagiarismReport created successfully');
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
        // $plagiarismreport = PlagiarismReport::find($id);

        // return view('plagiarismreports.show',compact('plagiarismreport'))->with('students',$students);

    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {
        $fyppart = Fyppart::where('id','=', $id)->first();
        return view('plagiarismreports.create')->with('fyppart',$fyppart);
        
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

        PlagiarismReport::find($id)->update($request->all());

        $plagiarismreport = PlagiarismReport::find($id);
        $fyppart = Fyppart::where('id','=',$plagiarismreport->fyp_id)->first();

        return view('lecturer/plagiarismreport')->with('plagiarismreport',$plagiarismreport)->with('fyppart',$fyppart)->with('success','Comment updated successfully');

    }


    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        PlagiarismReport::find($id)->delete();

        return redirect()->route('plagiarismreports.index')

                        ->with('success','PlagiarismReport deleted successfully');

    }

}