<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserTravelPassport extends Model {
    use HasFactory;

    protected $table = 'user_travel_passports';
    protected $fillable = ["passport_nationality", "passport_number", "passport_date_issued", "passport_date_expiry", "passport_issued_place", "passport_issued_country"];

    protected $casts = [
		'passport_date_issued' => 'datetime',
		'passport_date_expiry' => 'datetime'
	];

}
