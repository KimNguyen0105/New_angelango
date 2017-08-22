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
