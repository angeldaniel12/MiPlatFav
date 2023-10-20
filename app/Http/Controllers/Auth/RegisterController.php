<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => ['required', 'string', 'max:255','regex:/^[a-zA-ZÑñ\s]+$/'],
            'nombreusuario' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users','regex:/(.*)@(hotmail|gmail|outlook|yahoo)\.com$/i'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            //'fecharegistro'=> ['required', 'date'], //Se pide necesariamente hasta el momento la fecha de registro en el formuario
            'fechanac'=> ['required', 'date'],
            
        ]);
        
       
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nombre' => $data['nombre'],
            'nombreusuario' => $data['nombreusuario'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'fechanac'=> $data['fechanac'],
            'tipo' => $data['tipo'],
            
            //'fecharegistro'=> $data['fecharegistro'],
        ]);
        
    }
}
