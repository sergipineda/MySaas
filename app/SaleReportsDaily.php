<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class SaleReportsDaily extends Model
{
    protected $fillable = [
        'day', 'total'
    ];
}