<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 18 Aug 2017 03:11:07 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglOrderDetail
 * 
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $quantity
 * @property string $price
 * @property string $size
 * @property string $color
 *
 * @package App\Models
 */
class AglOrderDetail extends Eloquent
{
	protected $table = 'agl_order_detail';
	public $timestamps = false;

	protected $casts = [
		'order_id' => 'int',
		'product_id' => 'int',
		'quantity' => 'int'
	];

	protected $fillable = [
		'order_id',
		'product_id',
		'quantity',
		'price',
		'size',
		'color'
	];
}
