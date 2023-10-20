<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image ;
use App\Models\Photo;
use App\Models\Post;
use App\Models\Video;
use App\Models\Archivos;
use Spatie\Searchable\Search;

class NormalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('solonormal', ['only'=> ['index']]);
    }

    public function index()
    {
        $categories=Category::all();
        $posts=Post::all();
        return view('normal',['categories'=> $categories, 'posts'=>$posts]);
    }

    public function userser()
    {
        // $users = User::all(); // Obtiene todos los usuarios de la base de datos.
        $authenticatedUser = Auth::user(); // Obtén al usuario autenticado.
        
        $users = User::where('id', '!=', $authenticatedUser->id)
                     ->where('role', '!=', '0')
                     ->get();
         $fotos=Photo::all();
        return view('userlist', compact('users','fotos'));
       
    }

    public function perfiles($id)
    {
        $useres = User::findOrFail($id); // Busca al usuario por su ID.
        $posts=Post::all(); //CHECAR LA LOGICA PARA QUE SE MUESTREN CADA POST DE DE CADA PERFIL
        //$imagenes=Photo::findOrFail($id);//CHECAR LOGICA PARA QUE SE MUESTREN CADA IMAGEN DE CADA PERFIL
        return view('perfilusuarios', compact('useres','posts'));
    }

    public function nuevos(){
        return view('home');
    }

    public function postByCategory($category)
    {
        $categories = Category::all();
        $category =Category::where('nameCategoria','=',$category)->first();
        $categoryIdSelected=$category->id;
        $posts=Post::where('category_id', '=', $categoryIdSelected)->paginate(3);
        return view('normal', [
            'categories'=>$categories,
            'posts' => $posts,
            'categoryIdSelected'=> $categoryIdSelected
        ]);
    }


     public function imagenes()
     {
        $imag=Photo::all();
       
        return view('Fotos',['imag'=> $imag]);
     }
     public function fotosG()
     {
        $nue=Photo::all();
       
        return view('secacad',['nue'=> $nue]);
     }
    
    public function Documentos()
    {
        $documents= Archivos::all();
        return view('vistArch', compact('documents'));
    }

    public function videos()
    {
        $video=Video::all();
        return view('videos', compact('video'));
    }

    // public function show($id){
        
    //     return view('posts.show', compact('post'));
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) //Funcion que redirigira al perfil del usuario (Prueba1)
    {
        $posts= Post::find($id);
        
        return view('posts.showed',array('user' => Auth::user()), compact('posts'));
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function SalaPrincipalNormal()
    {
        return view('salaprincipalNormal');
    }

     public function Visuales()
     {
      return view('viewers');
     }
     public function Visuales2()
     {
      return view('viewer2');
     }
     public function Visualcad()
     {
      return view('vistas.vieweracad');
     }
     
     public function Visual3()
     {
      return view('vistas.viewercult');
     }
  
     public function Visual4()
     {
      return view('vistas.viewersocial');
     }
  
     public function Visual5()
     {
      return view('vistas.viewertec');
     }
     public function Visual6()
     {
      return view('vistas.viewerpoliti');
     }
     public function Visual7()
     {
      return view('vistas.viewerdeport');
     }
     public function Visual8()
     {
      return view('vistas.viewercine');
     }
     public function Visual9()
     {
      return view('vistas.viewerlugar');
     }
     public function Visual10()
     {
      return view('vistas.viewerviaje');
     }

     public function search(Request $request)
     {
         $searchResults = (new Search())
             ->registerModel(Post::class, 'title')
             ->registerModel(User::class, 'nombre')
             //->registerModel(Archivos::class, 'nombres','documento')
             ->perform($request->input('query'));
     
         return view('searchNormal', compact('searchResults'));
     }
     public function follow(User $user)
     {
         auth()->user()->following()->create([
             'following_id' => $user->id
         ]);
 
         return view('/', [$user]);
     }
     
     public function unfollow(User $user)
     {
         auth()->user()->following()->where('following_id', $user->id)->delete();
 
         return view('/', [$user]);
     }
 
     
}
