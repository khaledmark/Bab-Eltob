<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewEmail extends Model
{
    protected $fillable = [
        'user_id', 'old_email', 'new_email', 'code',
    ];

    public function scopenewEmailCode($query, $user, $code){

        return $query->where(function($q2) use($user, $code) {
            $q2->where([ ['user_id', $user->id], ['old_email', $user->email], ['code', $code] ]);
        });
    }
}
