<?php

/**
 * Created by Reliese Model.
<<<<<<< HEAD
 * Date: Tue, 22 Aug 2017 07:02:12 +0000.
=======
 * Date: Tue, 22 Aug 2017 06:58:47 +0000.
>>>>>>> 3e79027f7dec6419f9a0e776ab821eff8a07fe72
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
