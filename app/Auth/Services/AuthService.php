<?php

declare(strict_types=1);

namespace App\Auth\Services;

use App\User\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

readonly class AuthService
{
    public function __construct(
        private UserRepositoryInterface $userRepository
    )
    {
    }

    public function login(array $data): array
    {
        $user = $this->userRepository->findUserByEmail($data['email']);

        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['As credenciais fornecidas estão incorretas.'],
            ]);
        }

        if (!$user->is_super_admin) {
            $user->load('customerClient.customer');

            $customerClient = $user->customerClient;

            if ($customerClient && $customerClient->customer) {
                if ($customerClient->customer->trashed()) {
                    throw ValidationException::withMessages([
                        'email' => ['O acesso a este provedor está temporariamente suspenso.'],
                    ]);
                }

                if ($customerClient->trashed()) {
                    throw ValidationException::withMessages([
                        'email' => ['Seu vínculo com o provedor foi desativado.'],
                    ]);
                }
            }
        }

        $deviceName = $data['device_name'] ?? 'web_access';

        $user->tokens()->where('name', $deviceName)->delete();

        $token = $user->createToken($deviceName)->plainTextToken;

        return [
            'user' => $user,
            'token' => $token,
        ];
    }
}
