<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserPreference extends Model {
    use HasFactory;

    protected $table = 'user_preference';
    protected $fillable = [];

}
