<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempUser extends Model
{
    protected $fillable = [
        'email', 'confirmation_code', 'is_confirmed'
    ];
}
