<?php

declare(strict_types=1);

namespace App\Contract\Models;

use App\Customer\Models\CustomerClient;
use App\Invoice\Models\Invoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contract extends Model
{
    protected $fillable = [
        'customer_client_id',
        'erp_contract_id',
        'status',
        'activation_date',
        'reward_generated'
    ];

    protected $casts = [
        'activation_date' => 'date',
        'reward_generated' => 'boolean',
    ];

    public function client():BelongsTo
    {
        return $this->belongsTo(CustomerClient::class, 'customer_client_id');
    }


    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }

    public function pendingInvoices(): HasMany
    {
        return $this->invoices()->whereNull('paid_at');
    }
}
