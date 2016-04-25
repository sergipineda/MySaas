<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shoutout extends Model
{
    public $fillable = [
        'user', 'content',
    ];


}
