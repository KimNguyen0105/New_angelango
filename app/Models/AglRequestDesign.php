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
