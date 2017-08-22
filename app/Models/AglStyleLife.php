<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 22 Aug 2017 07:02:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglStyleLife
 * 
 * @property int $id
 * @property string $content_vi
 * @property string $content_en
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class AglStyleLife extends Eloquent
{
	protected $table = 'agl_style_life';

	protected $fillable = [
		'content_vi',
		'content_en'
	];
}
