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
