<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 21 Aug 2017 09:35:47 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglProductDiscount
 * 
 * @property int $id
 * @property int $product_id
 * @property string $price_discount
 * @property \Carbon\Carbon $date
 *
 * @package App\Models
 */
class AglProductDiscount extends Eloquent
{
	protected $table = 'agl_product_discount';
	public $timestamps = false;

	protected $casts = [
		'product_id' => 'int'
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
