<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 21 Aug 2017 02:42:56 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglSpecificProduct
 * 
 * @property int $id
 * @property int $product_id
 * @property int $size_id
 *
 * @package App\Models
 */
class AglSpecificProduct extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'product_id' => 'int',
		'size_id' => 'int'
	];

	protected $fillable = [
		'product_id',
		'size_id'
	];
}
