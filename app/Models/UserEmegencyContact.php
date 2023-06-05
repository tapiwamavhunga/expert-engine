<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserEmegencyContact extends Model {
    use HasFactory;

    protected $table = 'user_emegency_contact';
    protected $fillable = ["name", "email", "phone_number", "relationship", "street", "city", "country", "postal_code", "state"];

}
