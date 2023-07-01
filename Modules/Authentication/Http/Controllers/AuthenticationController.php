<?php

namespace Modules\Authentication\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Authentication\Http\Requests\AuthIntegratorRequest;
use Modules\Authentication\Domain\Service\AuthenticationService;
use Modules\Authentication\Http\Requests\TokenIntegratorRequest;

class AuthenticationController extends Controller
{
    private AuthenticationService $authenticationService;

    public function __construct()
    {
        $this->authenticationService = resolve(AuthenticationService::class);
    }

    public function authIntegratorAction(AuthIntegratorRequest $request): JsonResponse
    {
        try{
            $output = $this->authenticationService->auth(
                $request->validated()
            );

            return response()->json(
                ['authentication' => $output],
                Response::HTTP_OK
            );
        }catch(\Throwable $e){
            return response()->json([
                'error' => $e->getMessage()
            ], Response::HTTP_PAYMENT_REQUIRED);
        }
    }

    public function generateTokenAction(TokenIntegratorRequest $request): JsonResponse
    {
        try{
            $output = $this->authenticationService->generateToken(
                $request->validated()
            );

            return response()->json(
                ['tokenIntegrator' => $output->jsonSerialize()],
                Response::HTTP_OK
            );
        }catch(\Throwable $e){
            return response()->json([
                'error' => $e->getMessage()
            ], Response::HTTP_PAYMENT_REQUIRED);
        }
    }
}
