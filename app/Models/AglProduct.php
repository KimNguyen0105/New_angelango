<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 16 Aug 2017 08:19:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglProduct
 * 
 * @property int $id
 * @property string $title_vi
 * @property string $title_en
 * @property string $avatar
 * @property string $content_vi
 * @property string $content_en
 * @property bool $is_discount
 * @property string $price
 * @property string $size
 * @property int $view
 * @property int $rating
 * @property int $collection_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property bool $status
 * @property string $seo_title
 * @property string $seo_keyword
 * @property string $seo_description
 * @property string $seo_author
 *
 * @package App\Models
 */
class AglProduct extends Eloquent
{
	protected $table = 'agl_product';

	protected $casts = [
		'is_discount' => 'bool',
		'view' => 'int',
		'rating' => 'int',
		'collection_id' => 'int',
		'status' => 'bool'
	];

	protected $fillable = [
		'title_vi',
		'title_en',
		'avatar',
		'content_vi',
		'content_en',
		'is_discount',
		'price',
		'size',
		'view',
		'rating',
		'collection_id',
		'status',
		'seo_title',
		'seo_keyword',
		'seo_description',
		'seo_author'
	];
}
