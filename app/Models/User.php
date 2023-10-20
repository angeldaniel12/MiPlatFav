<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Message;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use App\Notifications\InvoicePaid;
use Laravel\Sanctum\HasApiTokens;
// use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail, Searchable
{
    use HasApiTokens, HasFactory, Notifiable;
    // use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     //Modelo del formulario de registro de usuarios
     //Es aqui donde especificamos que datos de nuestra tabla Usuarios necesitaremos para el registro en la plataforna
    protected $fillable = [
        'nombre',
        'email',
        'password',
        'nombreusuario',
        'fechanac',
        'tipo', // tipo =1 participante , 0=creador
        //'estado' //usuario activado =1, usuario no activado =0
        'direccion',
        'pais',
        'ciudad',
        'codigopostal',
        'fotos',
        'descripcion',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

     //Token para la confirmacion del correo 
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function chatRooms()
    {
        return $this->belongsToMany(Chat::class);
    }

    public function canJoinRoom($hash)
    {
        $chat = Chat::where('hash', $hash)->first();

        return $chat->users()->where('id', $this->id)->count();
    }

    public function message()
    {
        return $this->hasMany(Message::class);
    }
//      public function posts()
//      {
//         return $this->hasMany(Post::class, 'user_id');
//      }


//Metodo para busqueda de Usuarios
public function getSearchResult(): SearchResult 
{
    $url = route('perfil', $this->id);

    return new SearchResult(
        $this,
        $this->nombre,
        $url
    );
}


public function followers()
{
    return $this->hasMany(Follower::class, 'following_id');
}

public function following()
{
    return $this->hasMany(Follower::class, 'follower_id');
}


 }
 


