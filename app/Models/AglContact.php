<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 18 Aug 2017 03:11:07 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglContact
 * 
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string $title
 * @property string $message
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property bool $status
 *
 * @package App\Models
 */
class AglContact extends Eloquent
{
	protected $table = 'agl_contact';

	protected $casts = [
		'status' => 'bool'
	];

	protected $fillable = [
		'name',
		'phone',
		'address',
		'title',
		'message',
		'status'
	];
}
