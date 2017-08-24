<?php

/**
 * Created by Reliese Model.
<<<<<<< HEAD
 * Date: Thu, 24 Aug 2017 04:46:16 +0000.
=======
 * Date: Tue, 22 Aug 2017 11:15:51 +0000.
>>>>>>> e0f3749f97ba0b8fc7bc7946874b2ec83b97d338
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
