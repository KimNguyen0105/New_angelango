<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 21 Aug 2017 02:42:56 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglOrder
 *
 * @property int $id
 * @property string $name
 * @property string $fullname
 * @property string $address
 * @property string $phone
 * @property string $total_price
 * @property bool $status
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
		'status' => 'bool',
		'account_id' => 'int',
		'shipping_costs' => 'int',
		'total_item' => 'int'
	];

	protected $fillable = [
		'name',
		'fullname',
		'address',
		'phone',
		'total_price',
		'status',
		'account_id',
		'shipping_costs',
		'total_item'
	];
}
