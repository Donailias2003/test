<?php

namespace App\Http\Controllers;

use App\Models\Partita;
use App\Models\Marcatore;

class WelcomeController extends Controller
{
    public function index(){
        $partite = Partita::all();
        $marcatori = Marcatore::all();
        return view('welcome',compact('partite'));
    }


}
