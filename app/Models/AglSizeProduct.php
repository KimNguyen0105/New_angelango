<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 24 Aug 2017 04:46:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglSizeProduct
 * 
 * @property int $id
 * @property string $size
 *
 * @package App\Models
 */
class AglSizeProduct extends Eloquent
{
	protected $table = 'agl_size_product';
	public $timestamps = false;

	protected $fillable = [
		'size'
	];
}
