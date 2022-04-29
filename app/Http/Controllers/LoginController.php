<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ValidateUser;

class LoginController extends Controller
{
  /**
  * Handle an authentication attempt.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */

  public function __invoke()
  {
  // return "Bienvenido a la pagina principal";
  return view("login.signin");
  }

  public function authenticate(Request $request)
  {
    // var_dump($request);
    // die();
    $credentials = $request->validate([
      'username' => ['required'],
      'password' => ['required'],
    ]);

    $remember = ($request->has('remember')) ? true : false;

    $auth = Auth::attempt($credentials, $remember);

    if ($auth) {
      $request->session()->regenerate();
      return redirect()->intended('home');
    }

    return back()->withErrors([
      'email' => 'The provided credentials do not match our records.',
    ]);
  }

  public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
}

  // public function getSignIn() {
  //   return view('login.signin');
  // }



}
