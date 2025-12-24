<?php

declare(strict_types=1);

namespace App\Customer\Services;

use App\Customer\Interfaces\CustomerClientRepositoryInterface;
use App\Customer\Interfaces\CustomerErpRepositoryInterface;
use App\Customer\Interfaces\CustomerRepositoryInterface;
use App\Customer\Models\Customer;
use App\Customer\Models\CustomerClient;
use App\Customer\Models\CustomerErp;
use App\Role\Interfaces\RoleRepositoryInterface;
use App\User\Interfaces\UserRepositoryInterface;
use App\User\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Throwable;

readonly class CustomerRegisterService
{
    public function __construct(
        private UserRepositoryInterface           $userRepository,
        private CustomerRepositoryInterface       $customerRepository,
        private CustomerErpRepositoryInterface    $customerErpRepository,
        private CustomerClientRepositoryInterface $customerClientRepository,
        private RoleRepositoryInterface           $roleRepository,
    )
    {
    }

    /**
     * @throws Throwable
     */
    public function registerCustomer(array $data): array
    {
        return DB::transaction(function () use ($data) {
            $user = new User([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'telephone' => $data['telephone'],
                'document' => $data['document'], // CPF
                'password' => Hash::make($data['password']),
            ]);

            $this->userRepository->save($user);

            $customer = new Customer([
                'corporate_name' => $data['corporate_name'],
                'document' => $data['company_document'],
                'email' => $data['company_email'],
                'zip_code' => $data['zip_code'],
                'address' => $data['address'],
                'phone' => $data['phone'],
                'logo' => $data['logo'] ?? null
            ]);

            $this->customerRepository->save($customer);

            $erpConfigJson = [
                'url' => $data['erp_url'] ?? null,
                'token' => $data['erp_token'] ?? null,
                'app' => $data['erp_app'] ?? null,
            ];

            $customerErp = new CustomerErp([
                'customer_id' => $customer->id,
                'erp_id' => $data['erp_id'],
                'config' => $erpConfigJson,
                'config_points_activation' => $data['config_points_activation'],
                'config_points_recurring' => $data['config_points_recurring'],
                'config_cashback_percent' => $data['config_cashback_percent'],
            ]);

            $this->customerErpRepository->save($customerErp);
            
            $customerClient = new CustomerClient([
                'customer_id' => $customer->id,
                'user_id' => $user->id,
                'role_id' => $this->roleRepository->roleFindBySlug('admin-customer')->id
            ]);

            $this->customerClientRepository->save($customerClient);

            return [
                'user' => $user,
                'customer' => $customer,
            ];
        });
    }
}
