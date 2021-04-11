<?php

namespace App;

use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use Translatable;
    protected $table = 'abouts';
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'content', 
   ];
}
