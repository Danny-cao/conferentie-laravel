<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservering extends Model
{
    
    public function user_reservering()
    {
   return $this->belongsTo('App\User');
    }
    
    protected $fillable = [
        'idUser',
        'idTicket',
        'idMaaltijd',
        'betaalmethode',
        'barcode',
        'prijs',
        ];
}
