<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 24 Aug 2017 04:46:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglProductDiscount
 * 
 * @property int $id
 * @property int $product_id
 * @property int $price_discount
 * @property \Carbon\Carbon $date
 *
 * @package App\Models
 */
class AglProductDiscount extends Eloquent
{
	protected $table = 'agl_product_discount';
	public $timestamps = false;

	protected $casts = [
		'product_id' => 'int',
		'price_discount' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'product_id',
		'price_discount',
		'date'
	];
}
