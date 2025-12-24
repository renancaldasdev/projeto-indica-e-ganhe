<?php

declare(strict_types=1);

namespace App\Customer\Http\Controllers;

use App\Base\Http\Controllers\Controller;
use App\Customer\Http\Requests\CustomerRegisterRequest;
use App\Customer\Http\Resources\CustomerResource;
use App\Customer\Services\CustomerRegisterService;
use App\User\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Throwable;

class CustomerController extends Controller
{

    public function __construct(
        private readonly CustomerRegisterService $customerRegisterService
    )
    {
    }

    /**
     * @throws Throwable
     */
    public function registerCustomer(CustomerRegisterRequest $request): JsonResponse
    {
        $result = $this->customerRegisterService->registerCustomer($request->validated());

        return response()->json([
            'message' => 'Cadastro realizado com sucesso!',
            'data' => [
                'user' => new UserResource($result['user']),
                'customer' => new CustomerResource($result['customer']),
            ]
        ], 201);
    }
}
