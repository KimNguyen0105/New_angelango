<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 22 Aug 2017 11:15:51 +0000.
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
