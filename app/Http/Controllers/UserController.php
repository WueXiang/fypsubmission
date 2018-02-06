<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\User;
// use App\Http\Controllers\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Hash;


class UserController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $users = User::latest()->paginate(20);

        return view('users.index',compact('users'))

            ->with('i', (request()->input('page', 1) - 1) * 5);

    }


    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('users.create');
        //original
        // return view('users.create');

    }


    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {
        $password=Hash::make($request->id);
        $request->request->add(['password' => $password]);
        request()->validate([

            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'specialization' => 'nullable',
            'student'=>'nullable',
            'lecturer'=>'nullable',
            'admin'=>'nullable',

        ]);

        User::create($request->all());

        return redirect()->route('users.index')->with('success','User created successfully');

    }


    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        $user = User::find($id);

        return view('users.show',compact('user'));

    }


    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {
        
        $user = User::find($id);
        return view('users.edit',compact('user'));
        
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

            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'specialization' => 'nullable',
            'student'=>'nullable',
            'lecturer'=>'nullable',
            'admin'=>'nullable',
        ]);


        User::find($id)->update($request->all());

        return redirect()->route('users.index')

                        ->with('success','User updated successfully');

    }


    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        User::find($id)->delete();

        return redirect()->route('users.index')

                        ->with('success','User deleted successfully');

    }

}