<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserTravelVisa extends Model {
    use HasFactory;

    protected $table = 'user_travel_visas';
    protected $fillable = ["visa_nationality", "visa_type", "visa_number", "visa_number_expiration"];

    protected $casts = [
		'visa_number_expiration' => 'datetime'
	];

}
