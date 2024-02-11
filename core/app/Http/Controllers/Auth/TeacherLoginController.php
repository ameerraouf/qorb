<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TeacherLoginController extends Controller
{
    //protected $redirectTo = RouteServiceProvider::ADMIN_DASHBOARD;
    //protected $redirectTo = RouteServiceProvider::FRONT;


    public function __construct()
    {
        $this->middleware('guest:teacher', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('auth.teacher.login');
    }

    public function username()
    {
        return 'email';
    }

    public function login(Request $request)
    {
        // dd('hhhh');
        // Validate the form data
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        // Attempt to log the user in
        if (Auth::guard('teacher')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('teacher.teacherhome'));
        }
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('teacher')->logout();
        return redirect()->route('teacher.login');
    }
}
