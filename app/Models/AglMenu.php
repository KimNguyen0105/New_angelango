<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 22 Aug 2017 07:02:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglMenu
 * 
 * @property int $id
 * @property string $title_vi
 * @property string $title_en
 * @property int $sort_order
 *
 * @package App\Models
 */
class AglMenu extends Eloquent
{
	protected $table = 'agl_menu';
	public $timestamps = false;

	protected $casts = [
		'sort_order' => 'int'
	];

	protected $fillable = [
		'title_vi',
		'title_en',
		'sort_order'
	];
}
