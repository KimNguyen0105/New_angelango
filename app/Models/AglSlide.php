<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 22 Aug 2017 06:58:47 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglSlide
 * 
 * @property int $id
 * @property string $title_vi
 * @property string $title_en
 * @property string $link
 * @property string $avatar
 * @property bool $is_show
 * @property int $sort_order
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class AglSlide extends Eloquent
{
	protected $table = 'agl_slide';

	protected $casts = [
		'is_show' => 'bool',
		'sort_order' => 'int'
	];

	protected $fillable = [
		'title_vi',
		'title_en',
		'link',
		'avatar',
		'is_show',
		'sort_order'
	];
}
