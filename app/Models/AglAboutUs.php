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
 * Class AglAboutUs
 * 
 * @property int $id
 * @property string $title_vi
 * @property string $title_en
 * @property string $content_vi
 * @property string $content_en
 * @property string $avatar
 * @property string $images_other
 *
 * @package App\Models
 */
class AglAboutUs extends Eloquent
{
	protected $table = 'agl_about_us';
	public $timestamps = false;

	protected $fillable = [
		'title_vi',
		'title_en',
		'content_vi',
		'content_en',
		'avatar',
		'images_other'
	];
}
