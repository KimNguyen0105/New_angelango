<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 16 Aug 2017 08:19:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglRequestDesign
 * 
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property string $message
 * @property int $created_at
 * @property int $updated_at
 *
 * @package App\Models
 */
class AglRequestDesign extends Eloquent
{
	protected $table = 'agl_request_design';

	protected $casts = [
		'order_id' => 'int',
		'product_id' => 'int',
		'created_at' => 'int',
		'updated_at' => 'int'
	];

	protected $fillable = [
		'order_id',
		'product_id',
		'message'
	];
}
