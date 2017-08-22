<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 22 Aug 2017 06:58:47 +0000.
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
