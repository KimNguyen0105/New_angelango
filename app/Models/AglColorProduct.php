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
