<?php
/**
 * Created by PhpStorm.
 * User: sergi
 * Date: 18/04/16
 * Time: 17:12
 */

namespace App;


class CreadorDePerfilsJson  extends AbstractProfiler
{
    public function show($user){
        return "<JSON>
                Id: <b>" .$this->getuserId($user) . "</b></br>
                Name: " . $this->name . "
                </JSON>";
    }


}