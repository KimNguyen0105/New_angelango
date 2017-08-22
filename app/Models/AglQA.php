<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 22 Aug 2017 06:58:47 +0000.
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
