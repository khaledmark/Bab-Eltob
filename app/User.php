<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','name', 'email',
        'password','phone','city_id','region_id',
        'user_type', 'status', 'api_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
    
    public function Item()
    {
        return $this->hasone(Item::class);
    }
    
    public function scopeactive($query)
    {
        return $query->where(function ($q2) {
            $q2->where('status', true);
        });
    }

    public function scopeuser($query)
    {
        return $query->where(function ($q2) {
            $q2->where('user_type', 'user');
        });
    }
}
