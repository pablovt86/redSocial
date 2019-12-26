<?php

namespace App\Http\Controllers;
 use\App\Http\requests\UserUpdateRequest;
use\App\Http\requests\UserFormRequest;

use App\User;
use Illuminate\Http\Request;
class UserController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

  public function __construct()
  {
    $this->middleware('auth');
  }


    public function index(Request $request)
    {

      if ($request){
          $search = trim($request->get('search'));
      $users = User::where('name','LIKE', '%' .$search.'%')
    ->orderBy('id','asc')
    ->paginate(5);
    return view('usuarios.index',['users'=> $users,'search'=> $search]);
    }
    // $users = User::all();
    // return view('usuarios.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = new User();
        $usuario->name = request('name');
        $usuario->email = request('email');
        $usuario->password = request('password');
        $usuario->avatar = $request->file('avatar')->store('public');

        $usuario->save();
        return redirect('/usuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('usuarios.show',['user'=>User::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('usuarios.edit',['user'=>User::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {

      $usuario = User::findOrFail($id);
     
      $usuario->name = $request->get('name');
      $usuario->email = $request->get('email');
     
      if ($request->hasFile('avatar')) {
        $usuario->avatar = $request->file('avatar')->store('public');
      }
      $usuario->update();
      return redirect('/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();
        return redirect('/usuarios');
    }
}
