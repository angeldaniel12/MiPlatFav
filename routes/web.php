<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NormalController;
use App\Http\Controllers\Creador\PostController;
use App\Http\Controllers\Creador\UsersController;
use App\Http\Controllers\Creador\PhotoController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ListadoController;
// use App\Http\Livewire\Auth\Login;
// use App\Http\Livewire\Auth\Passwords\Confirm;
// use App\Http\Livewire\Auth\Passwords\Email;
 use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
use App\Models\User;
use App\Models\Photo;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Archivos;



// // Rutas para prueba de select 
//  Route::get('/pruebas',        [App\Http\Controllers\Admin\PostController::class, 'store']);

//use App\Http\Controllers\CreadorController;
/*use Spatie\Permission\Models\Role; //roles de usuario :registradi y creador

Role::create(['name' => 'participante']);
Role::create(['name' => 'creador']);
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['auth'])->group(function(){
    Route::get('markAsRead', function(){
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    })->name('markAsRead');
    Route::post('/mark-as-read', 'PostController@markNotification')->name('markNotification');
});



// Route::get('/sala1', 'HomeController@videochat')->name('Sala1');
// Route::get('/visual1', 'HomeController@visualizar')->name('visual1');

//chat
Route::get('chat', 'HomeController@chats')->name('chats');

Route::get('messages', 'HomeController@messages')
            ->name('messages');

Route::post('messages', 'HomeController@messageStore')
            ->name('messageStore');
Route::get('/salasInicio', 'HomeController@salaPrincipal')->name('principal');
//Salas de live para creadores
Route::get('/salas/sala2', 'HomeController@Sala2')->name('sala2');
Route::get('/salas/sala3', 'HomeController@Sala3')->name('sala3');
Route::get('/salas/sala4', 'HomeController@Sala4')->name('sala4');
Route::get('/salas/sala5', 'HomeController@Sala5')->name('sala5');
Route::get('/salas/sala6', 'HomeController@Sala6')->name('sala6');
Route::get('/salas/sala7', 'HomeController@Sala7')->name('sala7');
Route::get('/salas/sala8', 'HomeController@Sala8')->name('sala8');
Route::get('/salas/sala9', 'HomeController@Sala9')->name('sala9');
Route::get('/salas/sala10', 'HomeController@Sala10')->name('sala10');
Route::get('/salas/sala11', 'HomeController@Sala11')->name('sala11');
Route::get('/salas/sala12', 'HomeController@Sala12')->name('sala12');
Route::get('/salas/sala13', 'HomeController@Sala13')->name('sala13');
Route::get('/salas/sala14', 'HomeController@Sala14')->name('sala14');
Route::get('/salas/sala15', 'HomeController@Sala15')->name('sala15');
Route::get('/salas/sala16', 'HomeController@Sala16')->name('sala16');

//vista sala de lives
Route::get('/salas', 'HomeController@Salas')->name('rooms');
Route::get('/salas2', 'HomeController@Salas2')->name('rooms2');
Route::get('/salas3', 'HomeController@Salas3')->name('rooms3');
Route::get('/salas4', 'HomeController@Salas4')->name('rooms4');
Route::get('/salas5', 'HomeController@Salas5')->name('rooms5');

//------------------controlador para normales
//Salas de live para espectadores
Route::get('/salaInicio', 'NormalController@SalaPrincipalNormal')->name('salasNormal');
Route::get('/vistas/visual2', 'NormalController@Visualcad')->name('vistas.vieweracad');
Route::get('/vistas/visual3', 'NormalController@Visual3')->name('vistas.viewercult');
Route::get('/vistas/visual4', 'NormalController@Visual4')->name('vistas.viewersocial');
Route::get('/vistas/visual5', 'NormalController@Visual5')->name('vistas.viewertec');
Route::get('/vistas/visual6', 'NormalController@Visual6')->name('vistas.viewerpoliti');
Route::get('/vistas/visual7', 'NormalController@Visual7')->name('vistas.viewerdeport');
Route::get('/vistas/visual8', 'NormalController@Visual8')->name('vistas.viewercine');
Route::get('/vistas/visual9', 'NormalController@Visual9')->name('vistas.viewerlugar');
Route::get('/vistas/visual10', 'NormalController@Visual10')->name('vistas.viewerviaje');
Route::get('/vistas/visual11', 'NormalController@Visual11')->name('vistas.viewersala5');
Route::get('/vistas/visual12', 'NormalController@Visual12')->name('vistas.viewersala6');
Route::get('/vistas/visual13', 'NormalController@Visual11')->name('vistas.viewersala5');
Route::get('/documentos', 'NormalController@Documentos')->name('docuementos');

Route::get('/vistas', 'NormalController@Visuales')->name('views');
Route::get('/vistas2', 'NormalController@Visuales2')->name('views2');

// chats
Route::view('message', 'VistaChat')
        ->middleware('auth');

// //Vistas como usuario espectador
// Route::get('home', 'HomeController@index')-> middleware('auth');
//  Route::get('/home', 'NormalControlller@nuevos')->name('nuevos')->middleware('verified');

Route::post('/comments','CommentController@store')->name('comments.store');//insertar comentarios

Route::get('/posts/{category}', 'NormalController@postByCategory')->name('posts.category');//filtratro por categoria en Normalx
Route::get('blogs/{id}', 'NormalController@show')->name('postess');//lectura para post por categoria Normal
Route::get('posts/blogs/{id}', 'NormalController@show')->name('postess');//lectura para todos los post Normal
Route::get('/imagenes', 'NormalController@imagenes')->name('fotos');
Route::get('/fotos', 'NormalController@fotosG');
Route::get('/videos', 'NormalController@videos')->name('videos');
//perfiles
Route::get('/users', 'NormalController@userser')->name('lista');
Route::get('/perfiles/{id}', 'NormalController@perfiles')->name('perfilusuarios');

 //Ruta de prueba para seguidores 
 Route::post('/follow/{user}', 'NormalController@follow')->name('follow');
 Route::post('/unfollow/{user}', 'NormalController@unfollow')->name('unfollow');


//----------------------------------------------------------------------
Route::get('creadores', 'HomeController@creadores')->name('creadores');
//panel de ajustes
Route::get('/', 'PagesController@home');
Route::get('/perfil', 'HomeController@perfil')->name('perfil');

Route::get('ajustes', 'HomeController@ajustes')->name('Ajustest');
Route::get('actividad' ,'HomeController@actividad');

//cambio de contraseña
Route::get('Password','HomeController@cambio');

Route::POST('password/cambio','passwordController@updatePassword');

//bloqueos
Route::get('Bloqueo', 'HomeController@bloqueos');

Route::get('Donaciones', 'HomeController@donaciones');
//----------------------------------------

//Ruta para dirigir al modo creador
Route::get('/viewnormal', 'HomeController@espectador')->name('espectador');
//---------------------------------------------------//
Route::get('blog/{id}', 'PostsController@show')->name('postes');
Route::get('Categorias/{category}', 'CategoriesController@mostrar')->name('categories.ver');
Route::get('Etiquetas/{tag}', 'TagsController@show')->name('tags.show');
Route::get('/categorias/{id}', 'CategoriesController@obtener');

//rutas para guardar archivos y ver archivos en pdf

Route::get('/archivo/archivo', 'HomeController@archivo')->name('creador.archivo.files');
Route::get('/archivo/ver','ListadoController@ver')->name('creador.archivo.vistaArch');
// Route::get('/archivo/archivo', 'HomeController@archivo')->name('admin.archivo.files');
// Route::get('/archivo/ver','ListadoController@ver')->name('admin.archivo.vistaArch');


// Route::post('/ArchivoSubido','ArchivosController@insertar')->name('admin.archivo.Subidos');
// Route::get('/Listado', 'ListadoController@ver')->name('admin.archivo.ver');
// Route::delete('/Borrar', 'ArchivosController@destroy')->name('admin.archivo.eliminar');
Route::post('/ArchivoSubido','ArchivosController@insertar')->name('creador.archivo.Subidos');
Route::get('/Listado', 'ListadoController@ver')->name('creador.archivo.ver');
Route::delete('/Borrar/{id}', 'ArchivosController@destroy')->name('creador.archivo.eliminar');

// cambiar prefijo a creador
Route::group(['prefix'=>'creador', 'namespace'=>'Creador', 'middleware'=>'auth'],
    function(){
        Route::post('cargar/', 'PhotoController@store')->name('creador.archivo.store');
        Route::get('/imgen','PhotoController@index')->name('creador.archivo.ima');
        Route::delete('borrar/{photo}}', 'PhotoController@destroy')->name('creador.archivo.destroy');
        //rels  
        Route::post('/videos', 'ReelController@videoss')->name('creador.archivo.cargar');
        Route::get('/videos', 'ReelController@ver')->name('creador.archivo.ver');
        //borrar rels
        Route::delete('/borrar/{id}', 'ReelController@quitar')->name('creador.archivo.borrar');

        // Route::post('cargar/', 'PhotoController@store')->name('admin.archivo.store');
        // Route::get('/imgen','PhotoController@index')->name('admin.archivo.ima');
        // Route::delete('borrar/{photo}}', 'PhotoController@destroy')->name('admin.archivo.destroy');
        //Route::resource('/admin/image', 'Admin\PhotoController')->names('admin.archivo.imagen');
        //Route::post('archi', 'ArchivosController@storeFile')->name('archivo.guardar');
       
    }
  
);


// Route::get('/Rels', 'HomeController@rels')->name('Rels');

 //--------------------------------------------------------//


//Rutas para Usuarios Invitados
Route::get('/panelinv', 'InvitadosController@start')->name('start');
Route::get('/welcome', 'InvitadosController@end')->name('end');
//-------------------------------------------------------------//
//Rutas para vistas y acciones del perfil de usuarios CAMBIAR PREFIJO a creador
Route::group(['prefix'=>'creador', 'namespace'=>'Creador', 'middleware'=>'auth'],
   function() {
       // Route::get('user/PerfilEdit', 'UsersController@edit')->name();
        // Route::get('/PerfilEdit', 'UsersController@show')->name('admin.user.PerfilEdit');
        // Route::get('user/PerfilEdit', 'UsersController@edit')->name('admin.user.edit');
        // Route::put('user/PerfilEdit', 'UsersController@update')->name('admin.user.update');
        // Route::post('/PerfilEdit', 'UsersController@nuevo')->name('admin.user.nuevo');
        Route::get('/PerfilEdit', 'UsersController@show')->name('creador.user.PerfilEdit');
        Route::get('user/PerfilEdit', 'UsersController@edit')->name('creador.user.edit');
        Route::put('user/PerfilEdit', 'UsersController@update')->name('creador.user.update');
        Route::post('/PerfilEdit', 'UsersController@nuevo')->name('creador.user.nuevo');
        Route::get('/lista', 'UsersController@showFollowers');
       
       
    });
//----------------------------------------------------------------------//
//Rutas para las vistas y acciones de posts    
Route::group(['prefix'=>'creador', 'namespace'=>'Creador'], 

            function(){
                Route::get('posts', 'PostController@index')->name('creador.posts.hh');
                Route::get('posts/nuevo', 'PostController@nuevo')->name('creador.posts.nuevo');
                Route::post('posts', 'PostController@store')->name('creador.posts.store');//guardar los post en la base de datos
                Route::delete('posts/{post}', 'PostController@destroy')->name('creador.posts.destroy');
                Route::get('posts/{post}', 'PostController@edit')->name('creador.posts.edit');
                Route::put('posts/{post}', 'PostController@update')->name('creador.posts.update');
                Route::get('notificaciones', 'PostController@notif')->name('creador.posts.notificacion');
        // Route::get('posts', 'PostController@index')->name('admin.posts.hh');
        // Route::get('posts/nuevo', 'PostController@nuevo')->name('admin.posts.nuevo');
        // Route::post('posts', 'PostController@store')->name('admin.posts.store');//guardar los post en la base de datos
        // Route::delete('posts/{post}', 'PostController@destroy')->name('admin.posts.destroy');
        // Route::get('posts/{post}', 'PostController@edit')->name('admin.posts.edit');
        // Route::put('posts/{post}', 'PostController@update')->name('admin.posts.update');
        // Route::get('notificaciones', 'PostController@notif')->name('admin.posts.notificacion');
        Route::get('/', 'PostController@ver')->name('ver');
        Route::get('notificaciones', 'PostController@notif')->name('creador.posts.notificacion');
        
        
       

        //Route::post('posts/{post}/photos', 'PhotosController@store')->name('admin.posts.photos.store');

});
Route::get('posts/{post}',          [App\Http\Controllers\Admin\PostController::class, 'edit']);
Route::post('/subcategorias',       [App\Http\Controllers\Admin\PostController::class, 'subcategorias']);
//---------------------------------------------------------------------------------------------------//


//Rutas que controlaran las vistas para los invitados 
//Route::get('/welcomenew', 'WelcomeController@panelinv')->name('panelinv'); //-> Entrada de inicio para Usuarios Invitados
//Route::get('/welcome', 'WelcomeController@out')->name('out'); //-> Salida sin logueo para Usuarios Invitados
Route::get('/invacad', 'InvitadosController@invitacad')->name('invitacad'); //-> Pagina de contenido academico para invitados 
Route::get('/invcult', 'InvitadosController@invitcult')->name('invitcult');
Route::get('/invsocial', 'InvitadosController@invitsociet')->name('invitsociet');
Route::get('/invtec', 'InvitadosController@invitec')->name('invitec');

//Rutas de vistas de contenido general (Espectadores e invitados)
Route::get('/secult', 'HomeController@cultural')->name('cultural');
Route::get('/secacad', 'HomeController@academic')->name('academic');
Route::get('/secsocial', 'HomeController@socialit')->name('socialit');
Route::get('/sectecno', 'HomeController@tecnology')->name('tecnology');
Route::get('/menulive', 'HomeController@lives')->name('lives'); //Ruta que llevara a la Seccion de Lives

Route::get('/tecnologico', [App\Http\Controllers\Admin\PostController::class, 'tecnologico']);

Auth::routes(['verify' => true]);//redireccion de correo

// Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::resource('/normal', NormalController::class)->middleware('verified');

// //prueba de videochat
//  Route::get('/nose', 'ChatController@index')->name('homes');
//  Route::post('chat', 'ChatController@store')->name('chat.store');
// Route::get('chat/{chat}', 'ChatController@show')->name('chat.show');

/*
app.post("/pusher/auth", (req, res) => {
    const socketId = req.body.socket_id;
    const channel = req.body.channel_name;
    var presenceData = {
        user_id:
        Math.random()
        .toString(36)
        .slice(2) + Date.now()
    };
    const auth = pusher.authenticate(socketId, channel, presenceData);
    res.send(auth);
});
*/

//Rutas para Autenticacion con Google
//-> Para iniciar sesion con Google
Route::get('/login-google', function () {
    return Socialite::driver('google')->redirect();
});
 
//-> Cuando retorna la informacion del usuario
Route::get('/google-callback', function () {
    $user = Socialite::driver('google')->user();
    
    $userExists= User::where('external_id', $user->id)->where('external_auth','google')->first();
    
    if($userExists){
    Auth::login($userExists);

    } else{

        $userNew= User::create([
         'nombre'=> $user->nombre,
         'email'=> $user->email,
         'avatar'=> $user->avatar,
         'external_id'=> $user->id,
         'external_auth'=> 'google',
        ]);

        Auth::login($userNew);
    }
    
     return redirect('/home');
});


//ruta de etiquetas

route::get('Etiqueta', 'App\Http\Controllers\Categoria\CategoriaController@Mostrar');
Route::delete('Etiqueta/{id}','App\Http\Controllers\Categoria\CategoriaController@borrar')->name('crador.categoria.borrar');
route::post('AltaEtiqueta', 'App\Http\Controllers\Categoria\CategoriaController@AltaCategoria')->name('creador.categoria.alta');
// route::post('AltaCategoria', 'App\Http\Controllers\Categoria\CategoriaController@AltaCategoria')->name('admin.categoria.alta');

//ruta de categorias
Route::get('category', 'CategoriesController@index')->name('nuevo');
Route::get('Category', 'CategoriesController@ver')->name('nuevo');
Route::post('NuevoCategory', 'CategoriesController@nuevo')->name('creador.category.new');
// Route::post('NuevoCategory', 'CategoriesController@nuevo')->name('admin.category.new');


Auth::routes();
// Route::get('/home', function(){
//     $post=Post::withCount('user_id')->get();
//     return view('home',compact('post'));
// });
// Route::get('/home','HomeController@contar')->name('homeCreador');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas de busqueda
Route::post('/search', 'HomeController@search')->name('search');
Route::post('/searchNormal', 'NormalController@search')->name('searchNormal');

//rutas de seguidores
Route::get('/ista', 'PerfilController@lista');

///Rutas de Administrador

Route::group(['middleware'=>'admin', 'prefix'=> 'admin', 'namespace'=>'Admin'], 
  function(){
        Route::get('/admin', 'AdminController@ventana')->name('admin.principal.videos');
        Route::get('/admin', 'AdminController@relss')->name('admin.principal.rels');
        Route::get('/usuarios', 'AdminController@usuarios')->name('admin.principal.usuarios');
        Route::get('/post', 'AdminController@posts')->name('admin.principal.posts');
        Route::get('/imagenes', 'AdminController@imagenes')->name('admin.principal.imagenes');
        Route::get('/documents', 'AdminController@document')->name('admin.principal.documents');
        //gardar imagenes de usuarios
        Route::post('/editar', 'AdminController@avatar')->name('admin.principal.avatar');
        //borrar videos
        Route::delete('videos/{id}', 'AdminController@borrar')->name('admin.videos.borrar');
        //borrar posts de usuarios
        Route::delete('posts/{post}', 'AdminController@destroy')->name('admin.posts.destroy');
        //borrar usuarios
        Route::delete('user/{id}/borrar', 'AdminController@borrarUser')->name('admin.user.borrar');
        //borrar archivos
        Route::delete('documents/{id}', 'AdminController@borrardoc')->name('admin.doc.quitar');
        // borrar imagenes de usuarios
        Route::delete('photo/{photo}}', 'AdminController@destroyI')->name('admin.imagenes.borrar');

});