<?php

declare(strict_types=1);

namespace App\Auth\Http\Controllers;

use App\Auth\Http\Requests\AuthLoginRequest;
use App\Auth\Services\AuthService;
use App\User\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;

readonly class AuthController
{
    public function __construct(
        private AuthService $authService
    )
    {
    }

    public function login(AuthLoginRequest $request): JsonResponse
    {
        $result = $this->authService->login($request->validated());

        return response()->json([
            'message' => 'Login realizado com sucesso!',
            'data' => [
                'token' => $result['token'],
                'user' => new UserResource($result['user']),
            ]
        ]);
    }

    public function logout(): JsonResponse
    {
        auth()->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logout realizado com sucesso.']);
    }
}
