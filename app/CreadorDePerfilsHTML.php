<?php
/**
 * Created by PhpStorm.
 * User: sergi
 * Date: 18/04/16
 * Time: 16:58
 */

namespace App;


class CreadorDePerfilsHTML extends AbstractProfiler
{
    public function show($user){
        return "<div>
                Id: <b>" .$this->getuserId($user) . "</b></br>
                Name: " . $this->name . "
                </div>";
    }
}