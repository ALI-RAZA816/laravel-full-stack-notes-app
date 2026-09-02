<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ResetRequest;
use App\Http\Requests\OtpRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\NewPasswordRequest;
use App\Mail\OtpMail;

class ResetController extends Controller
{
    public function getOtp(ResetRequest $request){

        $userId = DB::table('users')->where('email',$request->email)->first();
        
        if(!$userId){
            return back()->withErrors([
                'email'=>'Account not found'
            ])->onlyInput('email');
        }
        
        session([
            'email'=>$request->email
        ]);
        $Otp = DB::table('otps')->where('user_id',$userId->id)->first();
        $otp_password = random_int(100000, 999999);

        if($Otp){
            if($userId->id == $Otp->user_id){
                DB::table('otps')->where('user_id',$userId->id)->update([
                    'user_id'=>$userId->id,
                    'otp'=>Hash::make($otp_password),
                    'created_at'=>now(),
                    'updated_at'=>now(),
                    'expires_at'=>now()->addMinutes(2)
                ]);
                try{
                    session(['user_id'=>$userId->id]);
                    Mail::to($userId->email)->send(new OtpMail($otp_password));
                }catch(\Exception $e){
                    return back()->withErrors([
                        'email'=>"Something wen't wrong"
                    ])->onlyInput('email');
                }
                return redirect()->route('otpform');
            }
        }else{
            DB::table('otps')->insert([
                'user_id'=>$userId->id,
                'otp'=>Hash::make($otp_password),
                'created_at'=>now(),
                'updated_at'=>now(),
                'expires_at'=>now()->addMinutes(2)
            ]);
            try{
                session(['user_id'=>$userId->id]);
                Mail::to($userId->email)->send(new OtpMail($otp_password));

            }catch(\Exception $e){
                return back()->withErrors([
                    'email'=>"Something wen't wrong"
                ])->onlyInput('email');
            }
            return redirect()->route('otpform');
        }


    }


    public function verifyOTP(OtpRequest $request){
        $otp = DB::table('otps')->where('user_id',session('user_id'))->first();
        
        if(now()->greaterThan($otp->expires_at)){
            DB::table('otps')->where('user_id', session('user_id'))->update([
                'otp'=>null,
                'expires_at'=>null
            ]);
            // session()->forget('user_id');

            return back()->withErrors([
                'otp'=>'OTP has expired'
            ]);
        }

        $hashed_otp = Hash::check($request->otp, $otp->otp);
        if($hashed_otp){
            return redirect()->route('changepassword');
        }else{
            return back()->withErrors([
                'otp'=>'Invalid OTP'
            ])->onlyInput('otp');
        }
    }

    public function setnewpassword(NewPasswordRequest $request){
        if(!session('user_id')) {
            return redirect()->route('resetpassword')->withErrors([
                'email' => 'Session expired. Please request a new OTP.'
            ]);
        }
        $password = DB::table('users')->where('id',session('user_id'))->update([
            'password'=>Hash::make($request->password),
        ]);

        if($password){
            return redirect()->route('login');
        }
    }
}
