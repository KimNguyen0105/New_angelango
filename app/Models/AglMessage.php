<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 16 Aug 2017 08:19:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglMessage
 * 
 * @property int $id
 * @property string $title
 * @property string $message
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property bool $status
 *
 * @package App\Models
 */
class AglMessage extends Eloquent
{
	protected $table = 'agl_message';
	public $incrementing = false;

	protected $casts = [
		'id' => 'int',
		'status' => 'bool'
	];

	protected $fillable = [
		'id',
		'title',
		'message',
		'status'
	];
}
