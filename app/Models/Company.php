<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model {
    use HasFactory;

    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $table = 'companies';
    protected $fillable = ["name", "contact_person", "email", "phone"];

}
