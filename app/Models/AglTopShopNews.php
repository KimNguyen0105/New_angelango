<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 21 Aug 2017 09:35:47 +0000.
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
