<?php

declare(strict_types=1);

namespace App\Invoice\Models;

use App\Contract\Models\Contract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    protected $fillable = [
        'contract_id',
        'erp_invoice_id',
        'amount',
        'due_date',
        'paid_at',
        'reward_generated'
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'due_date' => 'date',
        'paid_at' => 'date',
        'reward_generated' => 'boolean',
    ];

    public function contract(): BelongsTo
    {
        return $this->belongsTo(Contract::class);
    }

    public function wasPaidOnTime()
    {
        if (!$this->paid_at) {
            return false;
        }

        return $this->paid_at->lte($this->due_date);
    }
}
