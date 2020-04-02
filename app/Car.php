<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $guarded = [];

    public function scopeId($query, $id = null)
    {
        $query->where('id', $id ?: $this->id);
    }

    public function scopeAllSorted($query)
    {
        $query->orderBy('created_at', 'desc');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
