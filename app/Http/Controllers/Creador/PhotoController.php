<?php

namespace App\Http\Controllers\Creador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Models\Photo;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class PhotoController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $imag=Photo::where('user_id', auth()->user()->id)->paginate(20);
        
        return view('creador.archivo.imagen',compact('imag'));
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
    //funcion para insertar imagen en la base y mostrar imagen
    public function store(Request $request)
    {
       
        // $request ->validate([
        
        //     'img' => 'required|image|max:2048',
        //     'descripcion'=> 'required'
        // ]);
        $this->validate($request,[
            'img'=> 'required|image|max:2048',
            'descripcion' => 'required'
            
        ]);

        
        $nombre= Str::random(10). $request->file('img')->getClientOriginalName();
        $ruta= storage_path().'/app/public/imagenes/'. $nombre;Image::make($request->file('img'))->resize(1200, null, function($constraint){
            $constraint->aspectRatio();
            
        })->save($ruta);
        Photo::create([
            'user_id' => auth()->user()->id, 
            'url' => '/storage/imagenes/'.$nombre,
            'descripcion' =>$request ->get('descripcion'),
        ]);
        return redirect()->route('creador.archivo.files');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        /*$files = Photo::all();
        return view('admin.archivo.hg',compact('imag'));*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //funcion para la eliminacion de imagenes
    public function destroy(Photo $photo)
    {
        $imagen = str_replace('storage', 'public',$photo->url);
        Storage::delete($imagen);
        $photo->delete();
        return redirect()->route('creador.archivo.ima')->with('eliminar','ok');
    }
}
