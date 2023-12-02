<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

use Carbon\Carbon;
use Illuminate\Support\Str;

use App\Models\PasswordReset;
use App\Notifications\ResetPasswordRequest;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function forgetpassword(){
        return view('auth.passwords.email');
    }
    

    public function sendMail(Request $request)
    {
        $user = User::where('email', $request->email)
        ->where(function ($query) {
            $query->where('facebook_id', '')
                  ->orWhere('facebook_id', null)
                  ->where('google_id', '')
                  ->orWhere('google_id', null);
        })
        ->firstOrFail();

        $passwordReset = PasswordReset::updateOrCreate([
            'email' => $user->email,
        ], [
            'token' => Str::random(60),
        ]);
        if ($passwordReset) {
            $user->notify(new ResetPasswordRequest($passwordReset->token));
        }
    return Redirect::route('home.index')->with('success', 'Mail đặt lại mật khẩu đã được gửi , vui lòng kiểm tra hộp thư của bạn!');
    }

    public function reset(Request $request, $token)
    {
        $passwordReset = PasswordReset::where('token', $token)->firstOrFail();
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();

            return Redirect::route('home.index')->with('error', 'Đường dẫn đổi mật khẩu đã quá hạn hoặc không hợp lệ');
        }
        if($request->password_confirmation!=$request->password){
            return Redirect::route('home.index')->with('change', 'Đổi mật khẩu thất bại!');

        }
        $user = User::where('email', $passwordReset->email)->firstOrFail();
        $updatePasswordUser = $user->update($request->only('password'));
        $passwordReset->delete();

        return Redirect::route('home.index')->with('change', 'Đổi mật khẩu thành công!!!');

    }
 // ResetPasswordController.php
public function changepa(Request $request)
{
    $token = $request->input('token');
    return view('auth.passwords.reset', compact('token'));
}

    
}
