<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Translatable;

class SubSection extends Model
{
    use Translatable;
    
    protected $fillable = [
        'name', 'photo', 'section_id'
    ];

    public function Section()
    {
        return $this->belongsTo(Section::class);
    }
    
    public function Item()
    {
        return $this->belongsTo(Item::class);
    }
}
