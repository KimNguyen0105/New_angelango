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
 * Class AglBanner
 * 
 * @property int $id
 * @property string $image
 * @property int $type
 *
 * @package App\Models
 */
class AglBanner extends Eloquent
{
	protected $table = 'agl_banner';
	public $timestamps = false;

	protected $casts = [
		'type' => 'int'
	];

	protected $fillable = [
		'image',
		'type'
	];
}
