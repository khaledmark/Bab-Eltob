<?php

namespace App;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use Translatable;
    protected $table = 'cities';
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 

    ];
    
     public function regions()
    {
        return $this->hasMany(Region::class);
    }
    
    public function users()
    {
        return $this->hasMany(User::class);
    }
    
    public function Item()
    {
        return $this->belongsTo(Item::class);
    }
}
