<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use App\Models\Video;
use Spatie\Searchable\Search;
use App\Models\Message;
use Auth;

class HomeController extends Controller
{
    public function tabla()
    {
        $usuarios=User::all();
        $posts=Post::all();
        return view('home',compact('usuarios', 'posts'));
    }
    /*
    public function contar()
    {
        $postes=Post::count();
        // $postes=User::withCount('posts')->get();
        return view('home', compact('postes'));
    }
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware('auth');
        $this->middleware('solocreador', ['only'=>['index']]);
        $this->middleware('admin', ['only'=>['index']]);
    
    }

    public function rels() //Funcion que redirigira al perfil del usuario (Prueba1)
    {
        $video=Video::all();
        return view('creador.archivo.Rels',compact('video'));//return view ('profilecreador');
    }

    public function store()
    {
        
        Message::create([
            'sender_id'=>auth()-id(),
            'recipient_id'=> $request->recipient_id,
            'body'=>$request->body,
        ]);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

     /*funciones para que nos muestres todas las vista que vamos a usar en
     en el proyecto.
    */
    
     public function index()
    {
        return view('admin.principal.videosR'); 
     }
    //  public function indexs()
    //  {
         
    //       return view('admin.principal.index'); 
    //   }
    
    public function creadores()
    {
        $categories=Category::all();
        return view('home', ['categories'=> $categories]);
    }
    public function perfil()
    {
        return view('Perfil');
    }

    public function archivo()
    {
       
        return view('creador.archivo.files');
    }

    // public function rels()
    // {
      
    // }
   
    public function verarchivo()
    {
        return view('creador.archivo.vistaArch');
    }

    public function ajustes()
    {
        return view('Ajustes');
    }

    public function actividad()
    {
        return view('Acti');
    }

    public function cambio()
    {
        return view('cambioPassword');
    }

    public function donaciones() 
    {
        return view ('Donaciones');
    }
    public function bloqueos()
    {
        return view ('Bloqueos');
    }

    public function espectador(){

      return view('viewnormal');

    }

    public function cultural()
   {

        return view('secult');

   }

   public function academic()
   {

        return view('secacad');

   }

   public function socialit()
   {

        return view('secsocial');

   }

   public function tecnology (){

        return view('sectecno');

   }

   public function lives(){

        return view('menulive');

   }
   public function salaPrincipal(){
    return view('salaprincipal');
}
    public function visualizar()
    {
        return view('visualizador');
    }

    public function Salas()
    {
     return view('lives');
    }

    public function Salas2()
    {
        return view ('lives2');
    }

    public function Salas3()
    {
        return view ('lives3');
    }

    public function Salas4()
    {
        return view ('lives4');
    }
    public function Salas5()
    {
        return view ('lives5');
    }
   

   public function Sala2()
   {
    return view('salas.presenteracad');
   }
   
   public function Sala3()
   {
    return view('salas.presentercult');
   }

   public function Sala4()
   {
    return view('salas.presentersocial');
   }

   public function Sala5()
   {
    return view('salas.presentertec');
   }

   public function Sala6()
   {
    return view('salas.presenterpoliti');
   }
   public function Sala7()
   {
    return view('salas.presenterdeport');
   }
   public function Sala8()
   {
    return view('salas.presentercine');
   }
   public function Sala9()
   {
    return view('salas.presenteralugar');
   }
   public function Sala10()
   {
    return view('salas.presenteraviaje');
   }
   public function Sala11()
   {
    return view('salas.presenteraSala5');
   }
   public function Sala12()
   {
    return view('salas.presenteraSala6');
   }
   public function Sala13()
   {
    return view('salas.presenteraSala7');
   }
   public function Sala14()
   {
    return view('salas.presenteraSala8');
   }
   public function Sala15()
   {
    return view('salas.presenteraSala9');
   }
   public function Sala16()
   {
    return view('salas.presenteraSala10');
   }




//chat
public function chats(){
    return view('chats');
}

public function messages(){
    return Message::with('user')->get();
}

public function messageStore(Request $request){
    $user = Auth::user();

    $messages = $user->messages()->create([
        'message' => $request->message
    ]);

    broadcast(new SendMessage($user, $messages))->toOthers();

    return 'message sent';
}

   //Metodo general para las busquedas

   public function search(Request $request)
{
    $searchResults = (new Search())
        ->registerModel(Post::class, 'title')
        ->registerModel(User::class, 'id' ,'nombre')
        //->registerModel(Archivos::class, 'nombres','documento')
        ->perform($request->input('query'));

    return view('search', compact('searchResults'));
}
}
