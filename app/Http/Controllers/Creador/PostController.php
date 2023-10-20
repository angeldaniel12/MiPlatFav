<?php

namespace App\Http\Controllers\Creador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Tag;
use App\Events\PostEvent;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Notifications\PostNotification;
use App\Models\Post;
use App\Models\user;
use Illuminate\Support\Facades\DB;
//controlador de los contenidos de los posts
class PostController extends Controller
{
    public function index() 
    {
        /* funcion para mostrar los post de cada usuario */
        
        $posts= Post::where('user_id', auth()->id())->get();
                
        return view('creador.posts.hh', compact('posts',));
    }
    // public function todos(Post $post, Request $request)
    // {
    //     $postt=Post::all();
    //     return view('admin.principal.posts', compact('postt'));
    // }
  

    public function ver()
    {
        return view('Postes');
    }

    // public function nuevo()
    // {
    //     $categories =Category::all();
    //     $tags = Tag::all();
    //     $now = Carbon::now();
    //     $currentDate= $now->format('d-m-Y');
    //     return view('admin.posts.nuevo', compact('categories', 'now','tags' ,'currentDate'));
    // }

    public function subcategorias(Request $request){
        if(isset($request->texto)){
            $etiquetas = Tag::where('category_id', $request->texto)->get();
            return response()->json(
                [
                    'lista' => $etiquetas,
                    'success' => true
                ]
                );
        }else{
            return response()->json(
                [
                    'success' => false
                ]
                );

        }

    }

    //funcion para la modificacion del post
    public function update(Post $post, Request $request)
    {
        
        //validando 
        $this->validate($request, [
            'title' =>'required',
            'excerpt' => 'required',
            'body' => 'required',
            'category' => 'required'
        ]);
        $post->title=$request->get('title');
        $post->body=$request->get('body');
        $post->excerpt=$request->get('excerpt');
        $post->published_at=Carbon::now();
        //$post->published_at= $request->has('published_at') ? Carbon::parse($request->get('published_at')):now();
        $post->category_id=$request->get('category');
        $tagss=$request->input('tags');
        $post->save();

         $post->tags()->sync($request->get('tags'));
        return redirect()
        ->route('creador.posts.hh');
    }
    //funcion para la creacion de un nuevo post
    public function store(Request $request, User $user)
    {

        $this->validate($request,['title'=>'required']);
        $tags = Tag::all();
        
        $post = Post::create([
            'title' =>$request ->get('title'),
            'user_id' =>auth()->id()

            ]);
        
         //auth()->user()->notify(new PostNotification($post));
        //   $user::all()
        //   ->except($post->user_id)
        //   ->each(function(User $user)use ($post){
        //      $user->notify(new PostNotification($post));
        //   });
        event(new PostEvent($post));
        return redirect()
        ->route('creador.posts.edit', $post);
    }
   //funcion para la eliminacion de los post
    public function destroy(Post $post)
    {
        $post->tags()->detach();
        $post->delete();

        return redirect()
            ->route('creador.posts.hh')
            ->with('eliminar','ok');
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags=Tag::all();
        $now= Carbon::now();
        $currentDate= $now->format('d-m-Y');
        return view('creador.posts.edit', compact('categories', 'tags', 'post','currentDate'));
    }

    // //  //donde se agarrara los datos para el script del select
     public function getTags(Request $request)
     {
         if($request->ajax()){
             $Category=Tag::where('category_id', $request->category_id)->get();
             foreach($Category as $catego){
                 $categoArray[$catego->id]=$catego->name;
             }
             return response()->json($categoArray);
         }
     }
     //Notificacion de los post para los usuarios
    public function notif()
    {
         $postNotifications= auth()->user()->unreadNotifications();
         return view('creador.posts.notificacion', compact('postNotifications'));
    }
    //lectura de las notificaciones 
    public function markNotification(Request $request)
    {
        auth()->user()->unreadNotifications
        ->when($request->input('id'),function($query) use ($request){
            return $query->where('id',$request->input('id'));
        })->markAsRead();
        return response()->noContent();
    }



}
