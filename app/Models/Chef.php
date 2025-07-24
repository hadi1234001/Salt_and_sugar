<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Chef extends Authenticatable
{
    use HasFactory, SoftDeletes, Notifiable , HasApiTokens;

    protected $fillable = [
        'user_name',
        'first_name',
        'second_name',
        'last_name',
        'image_path',
        'cv_path',
        'email',
        'password',
        'birth_date',
        'mobile_number',
        'latitude',
        'longitude',
        'state_id',
        'overview',
    ];

    protected $hidden = ['password'];

    protected $primaryKey = 'chef_id';

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id', 'state_id');
    }

    public function distributer()
    {
        return $this->hasMany(Distributer::class, 'chef_id', 'chef_id');
    }

    public function plates()
    {
        return $this->hasMany(Plate::class, 'chef_id', 'chef_id');
    }
}
