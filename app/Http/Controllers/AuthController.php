<?php

namespace App\Http\Controllers;

use App\Classes\App\AppClass;
use App\Http\Requests\AuthRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('login');
    }

    public function auth(AuthRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            AppClass::addMessage('Zostałeś zalogowany.');

            return response()->json(route('home'));
        }

        AppClass::addError('Błędne dane logowania');

        return response()->json(route('login.form'));
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect(route('login.form'));
    }
}
