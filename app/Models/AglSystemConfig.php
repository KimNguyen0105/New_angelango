<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 22 Aug 2017 07:02:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglSystemConfig
 * 
 * @property int $id
 * @property string $logo
 * @property string $address_vi
 * @property string $address_en
 * @property string $google_map
 * @property string $facebook_link
 * @property string $twitter_link
 * @property string $instagram_link
 * @property string $hotline
 * @property string $phone_number
 * @property string $seo_title
 * @property string $seo_keyword
 * @property string $seo_author
 * @property string $seo_description
 * @property string $google_analytic
 *
 * @package App\Models
 */
class AglSystemConfig extends Eloquent
{
	protected $table = 'agl_system_config';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'id',
		'logo',
		'address_vi',
		'address_en',
		'google_map',
		'facebook_link',
		'twitter_link',
		'instagram_link',
		'hotline',
		'phone_number',
		'seo_title',
		'seo_keyword',
		'seo_author',
		'seo_description',
		'google_analytic'
	];
}
