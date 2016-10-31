<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maaltijd extends Model
{
     protected $fillable = [
        'maaltijd_type',
        'reservering',
        'dag',
        'maaltijdcode',
        ];
}
