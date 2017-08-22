<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 22 Aug 2017 07:02:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglColorProduct
 * 
 * @property int $id
 * @property string $color
 * @property int $id_product
 *
 * @package App\Models
 */
class AglColorProduct extends Eloquent
{
	protected $table = 'agl_color_product';
	public $timestamps = false;

	protected $casts = [
		'id_product' => 'int'
	];

	protected $fillable = [
		'color',
		'id_product'
	];
}
