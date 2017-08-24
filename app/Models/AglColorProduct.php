<?php

/**
 * Created by Reliese Model.
<<<<<<< HEAD
 * Date: Thu, 24 Aug 2017 04:46:15 +0000.
=======
 * Date: Tue, 22 Aug 2017 11:15:51 +0000.
>>>>>>> e0f3749f97ba0b8fc7bc7946874b2ec83b97d338
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglColorProduct
 * 
 * @property int $id
 * @property string $color
 * @property int $id_product
 *
 * @package App\Models
 */
class AglColorProduct extends Eloquent
{
	protected $table = 'agl_color_product';
	public $timestamps = false;

	protected $casts = [
		'id_product' => 'int'
	];

	protected $fillable = [
		'color',
		'id_product'
	];
}
