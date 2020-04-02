<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function scopeId($query, $id = null)
    {
        $query->where('id', $id ?: $this->id);
    }

    public function scopeAllSorted($query)
    {
        $query->orderBy('created_at', 'desc');
    }

    public function cars()
    {
        return $this->hasMany(Car::class, 'user_id');
    }
}
