<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Project;


class ProjectController extends Controller

{

    /**

     * Display a listing of the resource.
     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $projects = Project::latest()->paginate(5);

        return view('projects.index',compact('projects'))

            ->with('i', (request()->input('page', 1) - 1) * 5);

    }


    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('projects.create');

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

            'title' => 'required',

            'body' => 'required',

        ]);

        Project::create($request->all());

        return redirect()->route('projects.index')

                        ->with('success','Project created successfully');

    }


    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        $Project = Project::find($id);

        return view('projects.show',compact('Project'));

    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        $Project = Project::find($id);

        return view('projects.edit',compact('Project'));

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

            'title' => 'required',

            'body' => 'required',

        ]);

        Project::find($id)->update($request->all());

        return redirect()->route('projects.index')

                        ->with('success','Project updated successfully');

    }


    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        Project::find($id)->delete();

        return redirect()->route('projects.index')

                        ->with('success','Project deleted successfully');

    }

}