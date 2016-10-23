<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;

/**
 * App\Bezoeker
 *
 * @property integer $id
 * @property string $email
 * @property string $naam
 * @property integer $role
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Bezoeker whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Bezoeker whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Bezoeker whereNaam($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Bezoeker whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Bezoeker whereUpdatedAt($value)
 * @mixin \Eloquent
 */

class User extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use Authenticatable;
    
    protected $fillable = [
        'role',
		'email',
		'naam',
	];
}
