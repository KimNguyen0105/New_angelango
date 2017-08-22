<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 22 Aug 2017 06:58:47 +0000.
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
