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
