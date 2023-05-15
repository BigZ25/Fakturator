<?php

namespace App\Http\Controllers;

use App\Classes\App\AppClass;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use JsonException;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout', 'activation');
    }

    public function loginForm()
    {
        return view('login', ['title' => 'Logowanie']);
    }

    public function registerForm()
    {
        return view('register', ['title' => 'Rejestracja']);
    }

    /**
     * @throws \JsonException
     */
    public function loginPost(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (RateLimiter::tooManyAttempts($this->throttleKey($request), 2)) {
            $this->fireLockoutEvent($request);

            throw new JsonException('Zbyt wiele prób, spróbuj ponownie później.');
        }

        if (Auth::attempt($credentials)) {
            AppClass::addMessage('Zostałeś zalogowany.');

            return response()->json(route('home'));
        }

        RateLimiter::hit($this->throttleKey($request), 5 * 60);

        throw new JsonException('Błędne dane logowania');
    }

    public function registerPost(RegisterRequest $request)
    {
        $data = $request->validated() + ['key' => substr(uniqid(), 0, 64)];
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        $message = '<p>Kliknij na poniższy link aby aktywować konto</p><br><a href="' . $user->activation_link . '">' . $user->activation_link . '</a>';

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";

        mail($user->email, 'Potwierdzenie rejestracji', $message, $headers);

        Auth::loginUsingId($user->id);

        AppClass::addMessage('Konto zostało utworzone.');

        return response()->json(route('home'));
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect(route('login.form'));
    }

    public function activation($key)
    {
        if (auth()->user()->key === $key) {
            if (!auth()->user()->is_active) {
                auth()->user()->update([
                    'key' => null,
                    'is_active' => true,
                ]);

                AppClass::addMessage('Twoje konto zostało aktywowane.');
            } else {
                AppClass::addMessage('Twoje konto już jest aktywne.');
            }
        } else {
            AppClass::addWarning('Link wygasł.');
        }

        return Redirect(route('home'));
    }
}
