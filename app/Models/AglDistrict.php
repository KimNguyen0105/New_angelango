<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 21 Aug 2017 02:42:56 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

class AglDistrict extends Eloquent
{
	protected $table = 'agl_district';
	protected $primaryKey = 'districtid';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'type',
	];
}
