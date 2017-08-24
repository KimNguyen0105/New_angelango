<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 24 Aug 2017 04:46:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglUserPermission
 * 
 * @property int $id
 * @property int $user_id
 * @property int $permission_id
 *
 * @package App\Models
 */
class AglUserPermission extends Eloquent
{
	protected $table = 'agl_user_permission';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'permission_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'permission_id'
	];
}
