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
 * Class AglProduct
 * 
 * @property int $id
 * @property string $title_vi
 * @property string $title_en
 * @property string $avatar
 * @property string $content_vi
 * @property string $content_en
 * @property bool $is_discount
 * @property int $price
 * @property int $view
 * @property int $rating
 * @property int $menu_product_id
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
		'price' => 'int',
		'view' => 'int',
		'rating' => 'int',
		'menu_product_id' => 'int',
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
		'view',
		'rating',
		'menu_product_id',
		'status',
		'seo_title',
		'seo_keyword',
		'seo_description',
		'seo_author'
	];
}
