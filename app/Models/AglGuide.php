<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 21 Aug 2017 09:35:47 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglGuide
 * 
 * @property int $id
 * @property string $title_vi
 * @property string $title_en
 * @property string $content_vi
 * @property string $content_en
 * @property int $sort_order
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class AglGuide extends Eloquent
{
	protected $table = 'agl_guide';

	protected $casts = [
		'sort_order' => 'int'
	];

	protected $fillable = [
		'title_vi',
		'title_en',
		'content_vi',
		'content_en',
		'sort_order'
	];
}
