<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 22 Aug 2017 11:15:51 +0000.
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
 * @property string $avatar
 * @property bool $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class AglUser extends Eloquent
{
	protected $table = 'agl_user';

	protected $casts = [
		'status' => 'bool'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'username',
		'email',
		'password',
		'avatar',
		'status'
	];
}
