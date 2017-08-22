<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 21 Aug 2017 02:42:56 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

class AglWard extends Eloquent
{
	protected $table = 'agl_ward';
	protected $primaryKey = 'wardid';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'type',
	];
}
