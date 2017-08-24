<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 24 Aug 2017 04:46:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglTopShopNews
 * 
 * @property int $id
 * @property string $title_vi
 * @property string $title_en
 * @property string $avatar
 *
 * @package App\Models
 */
class AglTopShopNews extends Eloquent
{
	public $timestamps = false;

	protected $fillable = [
		'title_vi',
		'title_en',
		'avatar'
	];
}
