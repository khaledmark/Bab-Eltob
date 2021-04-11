<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Translatable;

class Section extends Model
{
    use Translatable;
    
    protected $fillable = [
        'name', 'photo',
    ];

    public function SubSections()
    {
        return $this->hasMany(SubSection::class);
    }
}
