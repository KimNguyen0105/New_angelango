<?php

/**
 * Created by Reliese Model.
<<<<<<< HEAD
 * Date: Thu, 24 Aug 2017 04:46:16 +0000.
=======
 * Date: Tue, 22 Aug 2017 11:15:51 +0000.
>>>>>>> e0f3749f97ba0b8fc7bc7946874b2ec83b97d338
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglNews
 * 
 * @property int $id
 * @property string $title_vi
 * @property string $title_en
 * @property string $avatar
 * @property string $content_vi
 * @property string $content_en
 * @property string $slug_vi
 * @property string $slug_en
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property bool $status
 * @property string $seo_title
 * @property string $seo_author
 * @property string $seo_keyword
 * @property string $seo_description
 *
 * @package App\Models
 */
class AglNews extends Eloquent
{
	protected $casts = [
		'status' => 'bool'
	];

	protected $fillable = [
		'title_vi',
		'title_en',
		'avatar',
		'content_vi',
		'content_en',
		'slug_vi',
		'slug_en',
		'status',
		'seo_title',
		'seo_author',
		'seo_keyword',
		'seo_description'
	];
}
