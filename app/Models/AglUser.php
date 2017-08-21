<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 18 Aug 2017 03:11:07 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglUser
 * 
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $fullname
 * @property string $avatar
 * @property bool $status
 * @property bool $type
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class AglUser extends Eloquent
{
	protected $table = 'agl_user';

	protected $casts = [
		'status' => 'bool',
		'type' => 'bool'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'username',
		'email',
		'password',
		'fullname',
		'avatar',
		'status',
		'type'
	];
}
