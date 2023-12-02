<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


use Socialite;
use Auth;
use App\Models\User;
use Exception;
use Validator, Redirect, Response, File;
use Session;
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
    public function getLogin(){
        return view('auth.login');
    }
    public function postLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // Sử dụng thông tin đăng nhập thực tế từ form để kiểm tra
        if (\Auth::attempt($credentials)) {
            return redirect()->route('home.index');
        }  
        return redirect()->route('get.login');
    }
    public function getLogout(){
        \Auth::logout();
        return redirect()->route('home.index');

    }




    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }


    public function handleFacebookCallback()
{

            try {
                $userSocial =   Socialite::driver('facebook')->user();
                $users       =   User::where(['email' => $userSocial->getEmail()])->first();
             
              
                if($users){
                    Auth::login($users);
                    return redirect('/');
                }else{
                  
            
                    $user = User::create([
                        'name'          => $userSocial->getName(),
                        'email'         => $userSocial->getEmail(),
                        'facebook_id'   => $userSocial->getId(),
                      'password' => ''
                    ]);
                    Auth::login($user, true);
                    return redirect()->route('home.index');
                }
            
        } catch (Exception $e) {
            // Xử lý lỗi nếu có
            return redirect()->route('get.login')->with('error', 'Đăng nhập bằng Facebook thất bại.');
        }

   
}


    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }




    public function handleGoogleCallback()
    {
        try {
            $userSocial =   Socialite::driver('google')->user();
            $users       =   User::where(['email' => $userSocial->getEmail()])->first();
         
        
          
            if($users){
                Auth::login($users);
                return redirect('/');
            }else{
              
        
                $user = User::create([
                    'name'          => $userSocial->getName(),
                    'email'         => $userSocial->getEmail(),
                    'avatar'         => $userSocial->getAvatar(),
                    'google_id'   => $userSocial->getId(),
                  'password' => ''
                ]);
                Auth::login($user, true);
                return redirect()->route('home.index');
            }
        
    } catch (Exception $e) {
        // Xử lý lỗi nếu có
        return redirect()->route('get.login')->with('error', 'Đăng nhập bằng google thất bại.');
    }


}

    




}
