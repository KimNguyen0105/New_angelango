<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 22 Aug 2017 06:58:47 +0000.
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
