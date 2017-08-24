<?php

/**
 * Created by Reliese Model.
<<<<<<< HEAD
 * Date: Thu, 24 Aug 2017 04:46:15 +0000.
=======
 * Date: Tue, 22 Aug 2017 11:15:51 +0000.
>>>>>>> e0f3749f97ba0b8fc7bc7946874b2ec83b97d338
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
