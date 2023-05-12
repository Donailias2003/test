<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\Exists;
use Pusher\Pusher;
use Illuminate\Support\Str;

class GestioneTvController extends Controller
{
    public function index()
    {
        //if (session('estenzione') != null) var_dump(session('estenzione'));
        $files = File::files(public_path('uploads'));
        return view('tvsettings',compact('files'));
    }

    public function play(Request $request){
        $request->validate([
            'mediaToPlay'=>'required'
        ]);

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            array('cluster' => env('PUSHER_APP_CLUSTER'))
        );
        $extension = "";
        if($request->mediaToPlay == "risultati"){
            $data = ['type'=>'risultati'];
        }else if ($request->mediaToPlay == "marcatori") {
            $data = ['type'=>'marcatori'];
        }else if ($request->mediaToPlay == "votazioni") {
            $data = ['type'=>'votazioni'];
        }else {
            $extension = pathinfo($request->mediaToPlay, PATHINFO_EXTENSION);
            $src = Str::after($request->mediaToPlay, public_path('uploads'));
            $src = ltrim($src, '/');
            switch ($extension) {
                case 'png':
                    $data = ['type'=>'image','src'=>$src];
                    break;
                case 'jpg':
                    $data = ['type'=>'image','src'=>$src];
                    break;
                case 'mp4':
                    $data = ['type'=>'video','src'=>$src];
                    break;    
                default:
                   $data = null;
                    break;
            }
        }
        if(isset($data)) $pusher->trigger('my-channel','play-media',$data);
        return redirect('/admin/tvmanager')->with('estenzione',$data);
    }

}
