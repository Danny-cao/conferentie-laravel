<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Reservering extends Model
{
    protected $fillable = [
		'user',
		'betaalmethode',
		'totale_prijs',
	];
}
