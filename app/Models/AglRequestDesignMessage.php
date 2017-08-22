<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 21 Aug 2017 09:35:47 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglRequestDesignMessage
 * 
 * @property int $id
 * @property int $request_design_id
 * @property string $message
 * @property int $type
 * @property int $user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class AglRequestDesignMessage extends Eloquent
{
	protected $table = 'agl_request_design_message';

	protected $casts = [
		'request_design_id' => 'int',
		'type' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'request_design_id',
		'message',
		'type',
		'user_id'
	];
}
