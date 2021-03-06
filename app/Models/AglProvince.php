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
