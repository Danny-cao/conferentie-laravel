<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Reservatie
 *
 * @property integer $id
 * @property string $betaalmethode
 * @property integer $user
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Reservatie whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reservatie wherePayment($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reservatie whereBezoeker($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reservatie whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Reservatie whereUpdatedAt($value)
 * @mixin \Eloquent
 */

class Reservering extends Model
{
    protected $fillable = [
		'user',
		'betaalmethode',
		'totale_prijs',
	];
}
