<?php

namespace App\Http\Controllers;

use App\Classes\App\AppClass;
use App\Http\Requests\AccountSettingsRequest;
use App\Models\User;

class AccountSettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(AccountSettingsRequest $request)
    {
        $user = User::find(auth()->id());

        $user->update($request->validated());

        if ($request->has('new_password') && $request->input('new_password') !== null) {
            $user->update(['password' => bcrypt($request->input('new_password'))]);
        }

        AppClass::addMessage("Zmiany zostały zapisane");

        return response()->json(route('account_settings.form'));
    }
}
