<?php

return [
    App\Base\Providers\AppServiceProvider::class,
    App\User\Providers\UserProvider::class,
    App\Customer\Providers\CustomerProvider::class,
    App\Contract\Providers\ContractServiceProvider::class,
    App\Erp\Providers\ErpServiceProvider::class,
    App\Invoice\Providers\InvoiceServiceProvider::class,
    App\Role\Providers\RoleServiceProvider::class,
    App\Wallet\Providers\WalletServiceProvider::class,
];
