<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;

trait HasBranchScope
{
    protected static function bootHasBranchScope()
    {
        static::addGlobalScope('branch', function (Builder ) {
            if (auth()->check() && !auth()->user()->hasRole('Super Admin')) {
                if (Session::has('current_branch_id')) {
                    ->where('branch_id', Session::get('current_branch_id'));
                } else {
                    ->where('branch_id', auth()->user()->branch_id);
                }
            }
        });

        static::creating(function ($model) {
            if (auth()->check() && !$model->branch_id) {
                $model->branch_id = Session::get('current_branch_id', auth()->user()->branch_id);
            }
        });
    }
}
