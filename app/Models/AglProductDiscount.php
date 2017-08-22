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
