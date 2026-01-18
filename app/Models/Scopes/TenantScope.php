<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class TenantScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        // 1. Check if a Tenant is identified from the URL/Route (Public Access)
        if (app()->has('currentTenant')) {
            $builder->where('tenant_id', app('currentTenant')->id);
            return;
        }

        // 2. Check if User is Authenticated (Admin Access)
        // usage of hasUser() prevents infinite loop when User model determines authentication
        if (auth()->hasUser()) {
            $user = auth()->user();
            if ($user->tenant_id) {
                // Tenant Admin / Tenant User
                $builder->where('tenant_id', $user->tenant_id);
            } else {
                 // Super Admin (No tenant_id).
                 // Logic: If they are Super Admin, they can see everything.
                 // Unless we want to enforce them to pick a context (not implemented yet).
                 // So we don't apply any filter here.
            }
        }
    }
}
