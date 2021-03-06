<?php

/**
 * Created by Reliese Model.
<<<<<<< HEAD
 * Date: Thu, 24 Aug 2017 04:46:16 +0000.
=======
 * Date: Tue, 22 Aug 2017 11:15:51 +0000.
>>>>>>> e0f3749f97ba0b8fc7bc7946874b2ec83b97d338
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
