<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 24 Aug 2017 04:46:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglOrderStatus
 * 
 * @property int $id
 * @property string $title_vi
 * @property string $title_en
 * @property string $description_vi
 * @property string $description_en
 * @property string $fa_class
 * @property int $sort_order
 *
 * @package App\Models
 */
class AglOrderStatus extends Eloquent
{
	protected $table = 'agl_order_status';
	public $timestamps = false;

	protected $casts = [
		'sort_order' => 'int'
	];

	protected $fillable = [
		'title_vi',
		'title_en',
		'description_vi',
		'description_en',
		'fa_class',
		'sort_order'
	];
}
