<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 22 Aug 2017 07:02:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglAccount
 * 
 * @property int $id
 * @property string $email
 * @property string $name
 * @property string $password
 * @property bool $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class AglAccount extends Eloquent
{
	protected $table = 'agl_account';

	protected $casts = [
		'status' => 'bool'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'email',
		'name',
		'password',
		'status'
	];
}
