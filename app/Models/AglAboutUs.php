<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 22 Aug 2017 06:58:46 +0000.
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
