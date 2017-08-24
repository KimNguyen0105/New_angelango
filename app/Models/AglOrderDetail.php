<?php

/**
 * Created by Reliese Model.
<<<<<<< HEAD
 * Date: Thu, 24 Aug 2017 04:46:16 +0000.
=======
 * Date: Tue, 22 Aug 2017 11:15:51 +0000.
>>>>>>> e0f3749f97ba0b8fc7bc7946874b2ec83b97d338
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
 * @property int $price
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
		'price' => 'int',
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
