<?php

namespace App\Erp\Models;

use App\Customer\Models\CustomerErp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Erp extends Model
{
    use HasFactory;

    protected $table = 'erps';

    protected $fillable = [
        'name',
        'slug',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function customerConfigs(): HasMany
    {
        return $this->hasMany(CustomerErp::class, 'erp_id');
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
}
