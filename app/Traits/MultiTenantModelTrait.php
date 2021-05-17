<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

trait MultiTenantModelTrait
{
    public static function bootMultiTenantModelTrait()
    {
        if (!app()->runningInConsole() && auth()->check()) {
            $isAdmin = auth()->user()->roles->contains(1);
            static::creating(function ($model) use ($isAdmin) {

                if (!$isAdmin) {
                    $model->created_by_id = auth()->id();
                }
            });
            if (!$isAdmin) {
                static::addGlobalScope('created_by_id', function (Builder $builder) {
                    $builder->where('created_by_id', auth()->id())->orWhereNull('created_by_id');
                });
            }
        }
    }
}
