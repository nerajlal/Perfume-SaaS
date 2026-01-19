<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = ['name', 'domain', 'plan', 'status', 'subscription_ends_at'];

    protected $casts = [
        'status' => 'boolean',
        'subscription_ends_at' => 'datetime',
    ];

    public function admin()
    {
        return $this->hasOne(User::class)->where('type', 'admin');
    }
}
