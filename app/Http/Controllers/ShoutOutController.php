<?php

namespace App\Http\Controllers;

use App\Events\ShoutoutAdded;
use App\Shoutout;
use Illuminate\Http\Request;

use App\Http\Requests;

class ShoutOutController extends Controller
{
    public function shoutout(){

        // formulari simple amb un botó de submit i una textarea.
        //1) Validar
        //2) Persistencia: migració, seed..: shotout notification, models
        //3) Event
        //

        $shoutout = Shoutout::create(['user'=>'Pepito','content'=>'pepito@pepitos.es']);
         dd($shoutout);

        event(new ShoutoutAdded($shoutout));



    }
}


