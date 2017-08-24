<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 24 Aug 2017 04:46:16 +0000.
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
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'name',
		'type'
	];
}
