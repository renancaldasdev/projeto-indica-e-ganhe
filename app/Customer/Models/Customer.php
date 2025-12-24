<?php

declare(strict_types=1);

namespace App\Customer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;


class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'document',
        'email',
        'corporate_name',
        'zip_code',
        'address',
        'phone',
        'logo',
    ];

    public function erpSettings(): HasOne
    {
        return $this->hasOne(CustomerErp::class);
    }
}
