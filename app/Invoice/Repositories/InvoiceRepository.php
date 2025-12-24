<?php

declare(strict_types=1);

namespace App\Invoice\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Invoice\Interfaces\InvoiceRepositoryInterface;
use App\Invoice\Models\Invoice;

class InvoiceRepository extends BaseRepository implements InvoiceRepositoryInterface
{
    protected string $model = Invoice::class;
}
