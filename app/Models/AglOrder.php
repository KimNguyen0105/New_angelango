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
 * Class AglOrder
 * 
 * @property int $id
 * @property string $order_id
 * @property string $name
 * @property string $fullname
 * @property string $address
 * @property string $phone
 * @property int $total_price
 * @property bool $status_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $account_id
 * @property int $shipping_costs
 * @property int $total_item
 *
 * @package App\Models
 */
class AglOrder extends Eloquent
{
	protected $table = 'agl_order';

	protected $casts = [
		'total_price' => 'int',
		'status_id' => 'bool',
		'account_id' => 'int',
		'shipping_costs' => 'int',
		'total_item' => 'int'
	];

	protected $fillable = [
		'order_id',
		'name',
		'fullname',
		'address',
		'phone',
		'total_price',
		'status_id',
		'account_id',
		'shipping_costs',
		'total_item'
	];
}
