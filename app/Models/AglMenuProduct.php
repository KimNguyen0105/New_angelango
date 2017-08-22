<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 18 Aug 2017 03:11:07 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglMenuProduct
 * 
 * @property int $id
 * @property string $title_vi
 * @property string $title_en
 * @property int $status
 *
 * @package App\Models
 */
class AglMenuProduct extends Eloquent
{
	protected $table = 'agl_menu_product';
	public $timestamps = false;

	protected $casts = [
		'status' => 'int'
	];

	protected $fillable = [
		'title_vi',
		'title_en',
		'status'
	];
}
