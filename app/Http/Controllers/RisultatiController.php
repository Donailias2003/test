<?php

namespace App\Http\Controllers;

use App\Models\Marcatore;
use Illuminate\Http\Request;
use App\Models\Partita;
use App\Models\User;
use Pusher\Pusher;

class RisultatiController extends Controller
{

    public function index(){
        $campo_utente = User::where('id',backpack_user()->id)->value('responsabile');
        if ($campo_utente == "") $partite = Partita::orderBy('data_partita', 'desc')->where('terminata','0')->get();
        else $partite = Partita::where('Campo',$campo_utente)->where('terminata','0')->orderBy('data_partita', 'desc')->get();
        if ($partite->count()<=0) $partite = null; 
        $marcatori = Marcatore::all();
        return view('risultati',compact('partite'),compact('marcatori'));
    }

    public function updateResults(Request $request){
        $request->validate([
            'id'=>'required',
            'punti_casa' => 'required',
            'punti_trasferta' => 'required',
            'marcatore' => 'required',
        ]);
        $partita = Partita::find($request->input('id'));
        $partita->punti_casa = $request->input('punti_casa');
        $partita->punti_trasferta = $request->input('punti_trasferta');
        $partita->save();

        $marcatore = Marcatore::where('nome', $request->input('marcatore'))->first();
        if ($marcatore !== null) {
            $marcatore->goal += 1;
            $marcatore->save();
        }else if ($marcatore === null) {
            $new_marcatore = new Marcatore();
            $new_marcatore->nome = $request->input('marcatore');
            $new_marcatore->goal = 1;
            $new_marcatore->save();
        }
        
        
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            array('cluster' => env('PUSHER_APP_CLUSTER'))
        );
        $data = ['id'=>$request->input('id'),'punti_casa'=>$request->input('punti_casa'),'punti_trasferta'=>$request->input('punti_trasferta')];
        $pusher->trigger('my-channel','my-event',$data);
        return redirect('/admin/risultati');
    }

    public function endPartita($id){
        if ($id != null) {
            $partita = Partita::find($id);
            $partita->terminata = 1;
            $partita->save();
            return redirect('/admin/risultati')->with('terminata','Partita terminata con successo!');
        }else return redirect('/admin/risultati')->with('terminata','Errore partita non terminata!');
    }
}
