<?php

namespace Database\Seeders;

use App\Customer\Models\Customer;
use App\Customer\Models\CustomerClient;
use App\Customer\Models\CustomerErp;
use App\Erp\Models\Erp;
use App\Role\Models\Role;
use App\User\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    public function run(): void
    {
        $roleAdminProvider = Role::firstOrCreate(['slug' => 'admin-customer'], ['name' => 'Admin Provedor']);
        $roleCliente = Role::firstOrCreate(['slug' => 'cliente-customer'], ['name' => 'Cliente']);

        User::firstOrCreate(
            ['email' => 'master@sistema.com'],
            [
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'telephone' => '11999999999',
                'document' => '00000000000',
                'password' => Hash::make('password'),
                'is_super_admin' => true,
            ]
        );
        $this->command->info('Super Admin criado.');


        $erp = Erp::firstOrCreate(
            ['slug' => 'ixc_soft'],
            [
                'name' => 'IXC Soft',
                'active' => true
            ]
        );


        $customer = Customer::firstOrCreate(
            ['document' => '12345678000199'],
            [
                'email' => 'contato@netfibra.com.br',
                'corporate_name' => 'NetFibra Provedor Ltda',
                'zip_code' => '99999',
                'address' => 'Rua Avenida Santa Cruz',
                'phone' => '9999999999',
                'logo' => null,
            ]
        );


        CustomerErp::firstOrCreate(
            [
                'customer_id' => $customer->id,
                'erp_id' => $erp->id
            ],
            [
                'config' => json_encode(['url' => 'https://ixc.netfibra.com', 'token' => '123']),
                'config_points_activation' => 100,
                'config_points_recurring' => 10,
                'config_cashback_percent' => 2.00,
            ]
        );


        $adminUser = User::firstOrCreate(
            ['email' => 'admin@netfibra.com'],
            [
                'first_name' => 'Carlos',
                'last_name' => 'Gerente',
                'telephone' => '11988888888',
                'document' => '11111111111',
                'password' => Hash::make('password'),
                'is_super_admin' => false,
            ]
        );

        CustomerClient::firstOrCreate(
            ['customer_id' => $customer->id, 'user_id' => $adminUser->id],
            [
                'role_id' => $roleAdminProvider->id,
                'erp_client_id' => '1',
                'referral_code' => 'NET-CARLOS',
                'referrer_id' => null,
            ]
        );
        $this->command->info('Admin do Provedor criado.');


        $clientUser = User::firstOrCreate(
            ['email' => 'joao@gmail.com'],
            [
                'first_name' => 'João',
                'last_name' => 'Silva',
                'telephone' => '11977777777',
                'document' => '22222222222',
                'password' => Hash::make('password'),
                'is_super_admin' => false,
            ]
        );

        CustomerClient::firstOrCreate(
            ['customer_id' => $customer->id, 'user_id' => $clientUser->id],
            [
                'role_id' => $roleCliente->id,
                'erp_client_id' => '1050',
                'referral_code' => 'JOAO-123',
                'referrer_id' => null,
            ]
        );
        $this->command->info('Cliente final criado.');
    }
}
