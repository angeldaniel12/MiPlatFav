<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvitadosController extends Controller
{
    
    //Controlador para las vistas de Usuarios Invitados 

    public function start(){

    return view('panelinv');

    }

    public function end(){

     return view('welcome');

    }

    public function lives() {

        //return view('livestreaminv');
      
         }
      
      public function invitcult (){
      
        return view('invcult');
      
      }
      
      public function invitacad(){
      
         return view ('invacad');
      
      }
      
      public function invitec (){
      
        return view ('invtec');
      }
      
      public function invitsociet (){
      
        return view ('invsocial');
      }
     
      
}
