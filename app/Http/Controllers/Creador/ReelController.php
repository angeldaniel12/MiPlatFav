<?php

namespace App\Http\Controllers\Creador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Video;

use Illuminate\Support\Facades\DB;

class ReelController extends Controller
{
    public function ver()
    {
       $v=Video::where('user_id', auth()->id())->get();
       return view('creador.archivo.videos',compact(['v']));
    }
    
    public function videoss(Request $request){
        $this->validate($request,[
            'video' => 'mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi',
            'descripcion' => 'required'
            
        ]);
        $nombre= $request->file('video');
       
        $nombre->move('rels', $nombre->getClientOriginalName());
        $nombreVideo=$nombre->getClientOriginalName();
     
            $video=new Video();
            $video->descripcion=$request->descripcion;
            $video->nombre=$nombreVideo;
            $video->user_id=auth()->user()->id;
            $video->save();
            return redirect()->route('creador.archivo.cargar');
        // }
        
        
    }

    public function quitar($id)
    {
        $rels = Video::find($id);
        Storage::disk('public')->delete($rels->nombre); 
        $rels-> delete();
        return redirect()
            ->route('creador.archivo.ver');
    }

}
