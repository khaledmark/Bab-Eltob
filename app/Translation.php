<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'translation', 'language_id', 'translatable_attribute'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function translatable()
    {
        return $this->morphTo();
    }
}
