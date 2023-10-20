<?php

namespace App\Http\Controllers\Creador;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Follower;
use App\Models\Tag;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('perfil', array('user' => Auth::user()) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('creador.user.PerfilEdit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user=User::all();
        
        return view('creador.user.PerfilEdit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function nuevo( Request $request, id $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
    public function update(Request $request,User $user)
    {
        //validamos los campos para la edicion de la base de datos
        $this->validate($request, [
        'nombreusuario'=>'max:50',
        'direccion' => 'max:50',
        'pais' => 'max:50',
        'ciudad' => 'max:50',
        'codigopostal' => 'max:5',
        'fotos' => '|image|mimes:png,jpg,jpeg,gif1|max:2048',
        'descripcion' => 'max:50'
    ]);
    $filename = Auth::id().'_'.time().'.'.$request->fotos->getClientOriginalName();
    $request->fotos->move(public_path('uploads/avatars'), $filename);
 
    $user = Auth::user();
    $user->fotos = $filename;
    $user->save();

    Auth::user()->update([
        'nombreusuario' => $request->input('nombreusuario'),
        'direccion' => $request->input('direccion'),
        'ciudad' => $request->input('ciudad'),
        'pais' => $request->input('pais'),
        
        'codigopostal' => $request->input('codigopostal'),
        'descripcion' => $request->input('descripcion'),

        
    ]);
        
    return redirect()
        ->route('Perfil',array('users' => Auth::user()) )
        ->with('flahs', 'Has actualizado tu perfil');
    }

public function showFollowers($user_id)
{
    $user = User::find($user_id);

    $followers = $user->followers;

    return view('Perfil', compact('user', 'followers'));
}
    
}
