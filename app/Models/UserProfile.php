<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserProfile extends Model {
    use HasFactory;

    protected $table = 'user_profiles';
    protected $fillable = ["home_address", "street", "city", "state", "postal_code", "country", "work_phone", "home_phone", "work_email"];

    protected $casts = [
		'postal_code' => 'datetime'
	];

}
