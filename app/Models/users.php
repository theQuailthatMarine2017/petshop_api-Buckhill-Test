<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name','email','password','avatar','address','phone_number'];

    // protected $attributes = [
    //     'is_admin' => 1,
    // ];
}
