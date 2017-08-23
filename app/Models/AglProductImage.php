<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 22 Aug 2017 11:15:51 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglProductImage
 * 
 * @property int $id
 * @property int $product_id
 * @property string $link
 * @property string $color
 *
 * @package App\Models
 */
class AglProductImage extends Eloquent
{
	protected $table = 'agl_product_image';
	public $timestamps = false;

	protected $casts = [
		'product_id' => 'int'
	];

	protected $fillable = [
		'product_id',
		'link',
		'color'
	];
}
