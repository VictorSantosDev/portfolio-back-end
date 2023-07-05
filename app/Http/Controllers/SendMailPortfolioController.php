<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SendMailPorfolioRequest;
use App\Domain\SendMail\Services\SendMailService;
use Exception;

class SendMailPortfolioController extends Controller
{
    private SendMailService $sendMailService;

    public function __construct()
    {
        $this->sendMailService = resolve(SendMailService::class);
    }

    public function sendAction(SendMailPorfolioRequest $request)
    {
        try{
            $this->sendMailService->sendMail($request->validated());

            dd('passou');
        }catch(Exception $e){

        }
    }
}
