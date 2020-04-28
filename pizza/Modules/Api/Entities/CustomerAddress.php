<?php

namespace Modules\Api\Entities;

use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    protected $fillable = ['title','address','state','city','postcode','phone','user_id'];

    /**
     * The customer address that belong to the user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
