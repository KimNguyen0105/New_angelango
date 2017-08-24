<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 24 Aug 2017 04:46:15 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglDistrict
 * 
 * @property string $districtid
 * @property string $name
 * @property string $type
 * @property string $location
 * @property string $provinceid
 *
 * @package App\Models
 */
class AglDistrict extends Eloquent
{
	protected $table = 'agl_district';
	protected $primaryKey = 'districtid';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'name',
		'type',
		'location',
		'provinceid'
	];
}
