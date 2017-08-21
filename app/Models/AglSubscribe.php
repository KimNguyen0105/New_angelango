<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 18 Aug 2017 03:11:07 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglSubscribe
 * 
 * @property int $id
 * @property string $email
 * @property bool $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class AglSubscribe extends Eloquent
{
	protected $table = 'agl_subscribe';

	protected $casts = [
		'status' => 'bool'
	];

	protected $fillable = [
		'email',
		'status'
	];
}
