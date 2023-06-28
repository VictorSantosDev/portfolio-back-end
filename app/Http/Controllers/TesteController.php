<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController
{
    public function test(Request $request)
    {
        dd($request->validated());
    }
}
