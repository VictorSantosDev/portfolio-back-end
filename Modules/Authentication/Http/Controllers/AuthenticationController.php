<?php

namespace Modules\Authentication\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Authentication\Domain\Service\AuthenticationService;
use Modules\Authentication\Http\Requests\TokenIntegratorRequest;

class AuthenticationController extends Controller
{
    public function __construct(
        private AuthenticationService $authenticationService
    ) {
    }

    public function authIntegratorAction(Request $request)
    {
        dd('auth');
    }

    public function generateTokenAction(TokenIntegratorRequest $request)
    {
        try{
            $token = $this->authenticationService->generateToken();

            return response()->json(
                ['token' => $token],
                Response::HTTP_OK
            );
        }catch(\Throwable $e){
            dd($e);
            return response()->json([
                'error' => $e->getMessage()
            ], Response::HTTP_PAYMENT_REQUIRED);
        }
    }
}
