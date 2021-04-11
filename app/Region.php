<?php

namespace App;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use Translatable;
    protected $table = 'regions';
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'city_id'

    ];
    public function city()
    {
        return $this->belongsTo(City::class);
    }

}
