<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 16 Aug 2017 08:19:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglPermission
 * 
 * @property int $id
 * @property string $name
 * @property string $link
 * @property string $note
 *
 * @package App\Models
 */
class AglPermission extends Eloquent
{
	protected $table = 'agl_permission';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'link',
		'note'
	];
}
