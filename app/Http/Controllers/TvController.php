<?php

namespace App\Http\Controllers;

use App\Models\Giocatori;
use App\Models\Marcatore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Partita;

class TvController extends Controller
{
    public function index(){
        if (Session::get('tvConnected') == null) {
            return view('tv.tvLogin');
        }else {
            if (Session::get('tvConnected')) {
                return view('tv.tv');
            }else return view('tv.tvLogin');
        }
    }

    public function connectTv(Request $request){
        $request->validate([
            'char1'=>'required',
            'char2'=>'required',
            'char3'=>'required',
            'char4'=>'required'
        ]);
        $pin = "".$request->char1 . $request->char2 .$request->char3. $request->char4."";
        if ($pin === "24HF") {
            Session::put('tvConnected', true);
            return redirect('/tv');
        }else return redirect('/tv');
        
    }

    public function disconnectTv(){
        Session::forget('tvConnected');
        return redirect('/tv');
    }

    public function apiPartite(){
        $partite = Partita::orderBy('data_partita', 'desc')->get();
        return json_encode($partite);
    }
    public function apiMarcatori(){
        $marcatori = Marcatore::orderBy('goal', 'desc')->get();
        return json_encode($marcatori);
    }

    public function apiVotazioni(){
        $giocatori = Giocatori::orderBy('voti', 'desc')->get();
        return json_encode($giocatori);
    }
}
