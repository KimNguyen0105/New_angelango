<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 21 Aug 2017 09:35:46 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglAboutUsDifferent
 * 
 * @property int $id
 * @property string $title_vi
 * @property string $title_en
 * @property string $content_en
 * @property string $content_vi
 * @property string $avatar
 * @property int $sort_order
 *
 * @package App\Models
 */
class AglAboutUsDifferent extends Eloquent
{
	protected $table = 'agl_about_us_different';
	public $timestamps = false;

	protected $casts = [
		'sort_order' => 'int'
	];

	protected $fillable = [
		'title_vi',
		'title_en',
		'content_en',
		'content_vi',
		'avatar',
		'sort_order'
	];
}
