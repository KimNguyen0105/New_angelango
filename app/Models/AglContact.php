<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 21 Aug 2017 09:35:47 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AglContact
 * 
 * @property int $id
 * @property string $name
 * @property string $email
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
		'email',
		'phone',
		'address',
		'title',
		'message',
		'status'
	];
}
