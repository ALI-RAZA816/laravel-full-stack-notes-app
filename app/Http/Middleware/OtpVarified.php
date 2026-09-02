<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OtpVarified
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    { 
        if (!session('user_id')) {
            return redirect()->route('resetpassword')->withErrors([
                'email' => 'Please request a reset code first.'
            ]);
        }

        if (!session('otp_varified')) {
            return redirect()->route('otpform')->withErrors([
                'otp' => 'Please verify your OTP first.'
            ]);
        }
        return $next($request);
    }
}
