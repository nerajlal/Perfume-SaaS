<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = ['name', 'domain', 'plan', 'status'];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function admin()
    {
        return $this->hasOne(User::class)->where('type', 'admin');
    }
}
