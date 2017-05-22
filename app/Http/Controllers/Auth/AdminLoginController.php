<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct ()
    {
      $this->middleware('guest:admin');
    }

    public function showLoginForm ()
    {
      return view('auth.admin-login');
    }

    public function login (Request $request)
    {
      // Validate the data
      $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required|min:6'
      ]);

      // Attempt to log the user in
      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // If successfull, then redirect to their intended locale_get_display_region
        return redirect()->intended(route('admin.dashboard'));// intended location or 'admin.dashboa rd'
      }

      // If unsuccessfull, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));//back() here gets them back to the page they were at the last time which is 'login' page
    }
}
