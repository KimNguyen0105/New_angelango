<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 24 Aug 2017 04:46:16 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglWard
 * 
 * @property string $wardid
 * @property string $name
 * @property string $type
 * @property string $location
 * @property string $districtid
 *
 * @package App\Models
 */
class AglWard extends Eloquent
{
	protected $table = 'agl_ward';
	protected $primaryKey = 'wardid';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'name',
		'type',
		'location',
		'districtid'
	];
}
