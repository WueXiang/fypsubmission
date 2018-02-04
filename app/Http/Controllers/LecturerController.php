<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Title;
use Illuminate\Support\Facades\Auth;


class LecturerController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function home()

    {
        return view('lecturer');
    }


    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function supervisor()
    {
        $titles = Title::where("supervisor_id", "=", Auth::id())->get();
        exit(Auth::id());
        return view('titles.index')->with($titles);
    }


    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    // public function store(Request $request)

    // {

    //     request()->validate([

    //         'title' => 'required',
    //         'type' => 'required',
    //         'specialization' => 'required',
    //         'supervisor_id' => 'required',


    //     ]);

    //     Title::create($request->all());

    //     return redirect()->route('titles.index')->with('success','Title created successfully');

    // }


    // /**

    //  * Display the specified resource.

    //  *

    //  * @param  int  $id

    //  * @return \Illuminate\Http\Response

    //  */

    // public function show($id)

    // {

    //     $title = Title::find($id);

    //     return view('titles.show',compact('title'));

    // }


    // /**

    //  * Show the form for editing the specified resource.

    //  *

    //  * @param  int  $id

    //  * @return \Illuminate\Http\Response

    //  */

    // public function edit($id)

    // {

    //     $title = Title::find($id);

    //     return view('titles.edit',compact('title'));

    // }


    // /**

    //  * Update the specified resource in storage.

    //  *

    //  * @param  \Illuminate\Http\Request  $request

    //  * @param  int  $id

    //  * @return \Illuminate\Http\Response

    //  */

    // public function update(Request $request, $id)

    // {

    //     request()->validate([

    //         'title' => 'required',
    //         'type' => 'required',
    //         'specialization' => 'required',

    //     ]);

    //     Title::find($id)->update($request->all());

    //     return redirect()->route('titles.index')

    //                     ->with('success','Title updated successfully');

    // }


    // /**

    //  * Remove the specified resource from storage.

    //  *

    //  * @param  int  $id

    //  * @return \Illuminate\Http\Response

    //  */

    // public function destroy($id)

    // {

    //     Title::find($id)->delete();

    //     return redirect()->route('titles.index')

    //                     ->with('success','Title deleted successfully');

    // }

}