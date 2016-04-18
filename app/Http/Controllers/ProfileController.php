<?php

namespace App\Http\Controllers;

use App\CreadorDePerfilsHTML;
use App\Profile;
use Illuminate\Http\Request;
use App\CreadorDePerfilsJson ;
use App\Http\Requests;
use Auth;

class ProfileController extends Controller
{

    public function preShow(){
        if ($json){
            return show(CreadorDePerfilsJson());
        }
        else{
            return show(CreadorDePerfilsHTML());

        }
        return show();
    }
    public function show(Profile $profile){

        return $profile->show(Auth::user());


    }


}
