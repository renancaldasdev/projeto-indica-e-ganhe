<?php

declare(strict_types=1);

namespace App\Customer\Models;

use App\Contract\Models\Contract;
use App\Role\Models\Role;
use App\User\Models\User;
use App\Wallet\Models\Wallet;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerClient extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'customer_id',
        'user_id',
        'erp_client_id',
        'referrer_id',
        'referral_code',
        'role_id',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id')->withTrashed();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function referrer(): BelongsTo
    {
        return $this->belongsTo(CustomerClient::class, 'referrer_id');
    }

    public function referrals(): HasMany
    {
        return $this->hasMany(CustomerClient::class, 'referrer_id');
    }

    public function wallet(): HasOne
    {
        return $this->hasOne(Wallet::class, 'customer_client_id');
    }

    public function contracts(): HasMany
    {
        return $this->hasMany(Contract::class, 'customer_client_id');
    }

    public function canRefer(): bool
    {
        return $this->contracts()->where('status', 'active')->exists();
    }
}
