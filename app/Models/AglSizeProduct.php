<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 21 Aug 2017 02:42:56 +0000.
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
