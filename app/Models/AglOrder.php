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
