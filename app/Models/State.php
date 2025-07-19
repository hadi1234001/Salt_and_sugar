<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $fillable = ['state'];
    public function chef()
    {
        return $this->hasMany(Chef::class, 'state_id', 'state_id');
    }
    public function client()
    {
        return $this->hasMany(Client::class, 'state_id', 'state_id');
    }
}
