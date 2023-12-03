<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;

use Auth;
use Illuminate\Support\Facades\Hash;

class AccountManager extends FrontendController
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function accountmanager()
  {
    // Lấy thông tin người dùng đăng nhập
    $user = Auth::user();
    $userId = Auth::user()->id;
$profile = Profile::where('id_account', $userId)->first();
if ($profile) {
  $user = $profile;

}
    $viewData = [
      'user' => $user
    ];

    // Đưa thông tin vào view
    return view('account.profile', $viewData);
  }

  public function changepasss()
  {

    return view('account.changepassword');
  }

  public function billing()
  {

    return view('account.purchasehistory');
  }

  public function changepassword(Request $request)
  {
    if ($request->newPassword != $request->confirmPassword) {
      return back()->with("error", "new password and confirm password doesn't match");
    } else {
      if (!Hash::check($request->currentPassword, auth()->user()->password)) {

        return back()->with("error", "Old Password Doesn't match!");
      }

      auth()->user()->update([
        'password' => Hash::make($request->newPassword)
      ]);

      return back()->with("status", "Password changed successfully!");
    }
  }

  public function delete (){
    $user = User::find(Auth::user()->id);
    Auth::logout();
    if ($user->delete()) {
         return Redirect::route('home.index')->with('global', 'Your account has been deleted!');
    }
    
  }
  public function saveprofile(Request $request){
    $userId = Auth::user()->id;
$profile = Profile::where('id_account', $userId)->first();
if (!$profile) {
  $profile = new Profile();
  $profile->id_account = $userId;
}
    $profile->name = $request->name;
    // $profile->id_account = Auth::user()->id;
    $profile->location = $request->location;
    $profile->note = $request->note;
    $profile->email = $request->email;

    $profile->phone = $request->phone;
    $profile->birthdate = $request->birthday;
    if ($request->hasFile('avatar')) {
      $file = upload_image('avatar');
      if (isset($file['name'])) {
          $profile->avatar = $file['name'];
      }
  }
    $profile->save();
  }
}
