<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendResetPassword;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Providers\Whatsapp;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function reqOtp(Request $r)
    {
    
        $user = User::where('email', $r->email)->first();
        if($user != null){
            DB::beginTransaction();
            try {
                $user->otp = mt_rand(1000,9999);
                $user->save();
    
                $details = [
                    'title' => 'Kode OTP Reset Password CoVerMap',
                    'body' => 'Kode OTP untuk akun '.$user->email.' : '.$user->otp
                ];
                DB::commit();
                Mail::to($user->email)->send(new SendResetPassword($details));
            
                return ['res' => 'success', 'msg'=>'Kode OTP telah dikirim ke email anda !'];
            } catch (\Throwable $th) {
                DB::rollBack();
                return $th->getMessage();
            }


        }else{
            return ['res' => 'error','msg' => 'Email tidak cocok !'];
        }
    }

    public function resetPassword(Request $r)
    {
        $user = User::where('email', $r->email)->where('otp', $r->otp)->first();
        if($user != null){
            $str_random = Str::random(8);
            $a = User::find($user->id);
            $a->password = Hash::make($str_random);
            $a->otp = NULL;
            $a->save();

            // event(new Whatsapp($user->no_wa, "*Hi $user->name* , password baru kakak adalah : *$str_random*, silahkan ganti password kakak lagi di menu profile untuk menjaga keamanan akun kakak. terimakasih"));
            return ['res' => 'success','msg' => 'Reset password berhasil, password kami kirimkan ke WA anda terimakasih !'];
        }else{
            return ['res' => 'error','msg' => 'Email dan No.Whatsap tidak cocok !'];
        }
    }
}
