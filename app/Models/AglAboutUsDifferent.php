<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 21 Aug 2017 02:42:56 +0000.
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
 *
 * @package App\Models
 */
class AglAboutUsDifferent extends Eloquent
{
	protected $table = 'agl_about_us_different';
	public $timestamps = false;

	protected $fillable = [
		'title_vi',
		'title_en',
		'content_en',
		'content_vi'
	];
}
