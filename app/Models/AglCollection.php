<?php

/**
 * Created by Reliese Model.
<<<<<<< HEAD
 * Date: Tue, 22 Aug 2017 07:02:12 +0000.
=======
 * Date: Tue, 22 Aug 2017 06:58:47 +0000.
>>>>>>> 3e79027f7dec6419f9a0e776ab821eff8a07fe72
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglCollection
 * 
 * @property int $id
 * @property string $title_vi
 * @property string $title_en
 * @property string $avatar
 * @property string $images
 * @property string $content_vi
 * @property string $content_en
 * @property string $slug_vi
 * @property string $slug_en
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property bool $status
 *
 * @package App\Models
 */
class AglCollection extends Eloquent
{
	protected $table = 'agl_collection';

	protected $casts = [
		'status' => 'bool'
	];

	protected $fillable = [
		'title_vi',
		'title_en',
		'avatar',
		'images',
		'content_vi',
		'content_en',
		'slug_vi',
		'slug_en',
		'status'
	];
}
