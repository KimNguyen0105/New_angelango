<?php

/**
 * Created by Reliese Model.
<<<<<<< HEAD
 * Date: Thu, 24 Aug 2017 04:46:15 +0000.
=======
 * Date: Tue, 22 Aug 2017 11:15:51 +0000.
>>>>>>> e0f3749f97ba0b8fc7bc7946874b2ec83b97d338
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglAccount
 * 
 * @property int $id
 * @property string $email
 * @property string $name
 * @property string $phone_number
 * @property \Carbon\Carbon $birthday
 * @property string $password
 * @property bool $status
 * @property bool $gender
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class AglAccount extends Eloquent
{
	protected $table = 'agl_account';

	protected $casts = [
		'status' => 'bool',
		'gender' => 'bool'
	];

	protected $dates = [
		'birthday'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'email',
		'name',
		'phone_number',
		'birthday',
		'password',
		'status',
		'gender'
	];
}
