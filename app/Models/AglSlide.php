<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 16 Aug 2017 08:19:23 +0000.
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
 * @property int $created_at
 * @property int $updated_at
 *
 * @package App\Models
 */
class AglSlide extends Eloquent
{
	protected $table = 'agl_slide';

	protected $casts = [
		'is_show' => 'bool',
		'sort_order' => 'int',
		'created_at' => 'int',
		'updated_at' => 'int'
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
