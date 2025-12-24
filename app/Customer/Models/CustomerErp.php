<?php

namespace App\Customer\Models;

use App\Erp\Models\Erp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerErp extends Model
{
    use HasFactory, softDeletes;

    protected $fillable = [
        'customer_id',
        'erp_id',
        'config',
        'config_points_activation',
        'config_points_recurring',
        'config_cashback_percent',
    ];

    protected $casts = [
        'config' => 'array',
        'config_cashback_percent' => 'decimal:2',
        'config_points_activation' => 'integer',
        'config_points_recurring' => 'integer',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function erp(): BelongsTo
    {
        return $this->belongsTo(Erp::class);
    }

    public function getErpUrlAttribute(): string
    {
        return rtrim($this->config['url'] ?? '', '/');
    }

    public function getErpTokenAttribute()
    {
        return $this->config['token'] ?? null;
    }
}
