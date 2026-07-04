<?php

namespace App\Models;

use App\Traits\HasBranchScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InventoryTransaction extends Model
{
    use HasFactory, HasBranchScope;

    protected  = [
        'product_id',
        'branch_id',
        'type',
        'quantity',
        'reference_type',
        'reference_id',
        'notes',
        'created_by',
    ];

    protected  = [
        'quantity' => 'decimal:2',
    ];

    public function product(): BelongsTo
    {
        return ->belongsTo(Product::class);
    }

    public function branch(): BelongsTo
    {
        return ->belongsTo(Branch::class);
    }
}
