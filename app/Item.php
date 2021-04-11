<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'name', 'price', 'description', 'views_count','address','lat', 'lang',
        'user_id','sub_section_id','city_id', 'region_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subSection()
    {
        return $this->belongsTo(SubSection::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
    
     public function photos()
    {
        return $this->hasMany(Photo::class);
    }

}
