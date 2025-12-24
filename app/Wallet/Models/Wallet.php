<?php

declare(strict_types=1);

namespace App\Wallet\Models;

use App\Customer\Models\CustomerClient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Wallet extends Model
{
    protected $fillable = [
        'customer_client_id',
        'points_balance',
        'cashback_balance',
    ];

    protected $casts = [
        'points_balance' => 'integer',
        'cashback_balance' => 'decimal:2',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(CustomerClient::class, 'customer_client_id');
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(WalletTransaction::class, 'wallet_id')
            ->orderBy('created_at', 'desc');
    }
}
