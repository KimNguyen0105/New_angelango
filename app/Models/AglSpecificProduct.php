<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 24 Aug 2017 04:46:16 +0000.
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
