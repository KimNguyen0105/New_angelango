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
 * Class AglQA
 * 
 * @property int $id
 * @property int $account_id
 * @property string $content
 * @property int $product_id
 * @property bool $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class AglQA extends Eloquent
{
	protected $table = 'agl_q_a';

	protected $casts = [
		'account_id' => 'int',
		'product_id' => 'int',
		'status' => 'bool'
	];

	protected $fillable = [
		'account_id',
		'content',
		'product_id',
		'status'
	];
}
