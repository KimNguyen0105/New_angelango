<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 21 Aug 2017 09:35:47 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglRequestDesign
 * 
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $account_id
 * @property bool $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class AglRequestDesign extends Eloquent
{
	protected $table = 'agl_request_design';

	protected $casts = [
		'order_id' => 'int',
		'product_id' => 'int',
		'account_id' => 'int',
		'status' => 'bool'
	];

	protected $fillable = [
		'order_id',
		'product_id',
		'account_id',
		'status'
	];
}
