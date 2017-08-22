<?php

/**
 * Created by Reliese Model.
<<<<<<< HEAD
 * Date: Tue, 22 Aug 2017 07:02:12 +0000.
=======
 * Date: Tue, 22 Aug 2017 06:58:46 +0000.
>>>>>>> 3e79027f7dec6419f9a0e776ab821eff8a07fe72
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
