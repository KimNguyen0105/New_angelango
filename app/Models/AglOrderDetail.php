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
 * Class AglOrderDetail
 * 
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $quantity
 * @property string $price
 * @property int $product_size_id
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
		'quantity' => 'int',
		'product_size_id' => 'int'
	];

	protected $fillable = [
		'order_id',
		'product_id',
		'quantity',
		'price',
		'product_size_id',
		'color'
	];
}
