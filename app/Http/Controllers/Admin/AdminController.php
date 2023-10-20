<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\Archivos;
use App\Models\Photo;
use App\Models\Video;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        
    
        $this->middleware('admin');
        // $this->middleware('adminmiddleware', ['only'=> ['index']]);
    }
     public function ventana()
     {
        
        return view('admin.principal.videosR'); 
        
     }

     public function relss()
     {
        $video=Video::all();
        return view('admin.principal.rels',compact('video')); 
        
     }
    
    public function usuarios()
    {
        $user=User::all();
        return view('admin.principal.usuarios', compact('user'));
    }

    public function posts()
    {
        $poste=Post::all();
        return view('admin.principal.posts', compact('poste'));
    }
    public function imagenes()
    {
        $imag=Photo::all();
       
        return view('admin.principal.imagenes',['imag'=> $imag]);
    }

    public function document()
    {
        $document=Archivos::all();
        return view('admin.principal.documents', compact('document'));
    }
     //funcion para borrar archivos de usarios
     public function borrardoc($id)
     {
        $archi = Archivos::find($id);
        Storage::disk('public')->delete($archi->nombres); 
        $archi-> delete();
        
        return  redirect()->route('admin.principal.documents');
        
     }

     public function avatar(Request $request)
     {
         //validamos los campos para la edicion de la base de datos
         $this->validate($request,[ 'avatar' => '|image|mimes:png,jpg,jpeg,gif1|max:2048']);
         
        
     
     $filename = Auth::id().'_'.time().'.'.$request->avatar->getClientOriginalName();
     $request->avatar->move(public_path('uploads/avatars'), $filename);
  
     $admin = Auth::user();
     $admin->avatar = $filename;
     $admin->save();
        
     return redirect()
         ->route('admin.principal.usuarios',array('users' => Auth::user()));
         
     }

    // public function todos()
    // {
        
    // }
    public function borrar($id)
    {
        $video = Video::find($id);
        Storage::disk('public')->delete($video -> nombre); 
        $video -> delete();
        return redirect()
            ->route('admin.principal.rels');
    }

    //funcion para borrar posts para los usuarios
    public function destroy(Post $post)
    {
        $post->tags()->detach();
        $post->delete();

        return redirect()
            ->route('admin.principal.posts');
           
    }
    //funcion para borrar usuarios 
    public function borrarUser($id)
    {
        $user= User::find($id);
        $user->delete();
        return redirect()
            ->route('admin.principal.usuarios');
            
    }
   
      //funcion para borrar imagenes de usuarios
      public function destroyI(Photo $photo)
      {
          $imagen = str_replace('storage', 'public',$photo->url);
          Storage::delete($imagen);
          $photo->delete();
          return redirect()->route('admin.principal.imagenes');
      }

}
