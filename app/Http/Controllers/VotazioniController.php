<?php

namespace App\Http\Controllers;

use App\Models\Giocatori;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Pusher\Pusher;

class VotazioniController extends Controller
{
    public function index(){        
        $serverStatus = Server::where('id',1)->get('status')->first();
        $giocatori = Giocatori::get();
        return view('vota',compact('giocatori'),compact('serverStatus'));
    }

    public function votaGiocatore($id){
        if ($id != null) {
            $pusher = new Pusher(
                env('PUSHER_APP_KEY'),
                env('PUSHER_APP_SECRET'),
                env('PUSHER_APP_ID'),
                array('cluster' => env('PUSHER_APP_CLUSTER'))
            );
            $pusher->trigger('my-channel','new-vote',null);
            $giocatore = Giocatori::find($id);
            $giocatore->voti += 1;
            $giocatore->save();
            Session::put('voted',true);
            return back();
        }
    }

    public function revote(){
        Session::forget('voted');
        return back();
    }
}
