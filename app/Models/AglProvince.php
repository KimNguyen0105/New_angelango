<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 21 Aug 2017 02:42:56 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglProvince
 *
 * @property string $provinceid
 * @property string $name
 * @property string $type
 *
 * @package App\Models
 */
class AglProvince extends Eloquent
{
	protected $table = 'agl_province';
	protected $primaryKey = 'provinceid';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'type'
	];
}
