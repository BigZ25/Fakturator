<?php

namespace App\Http\Controllers;

use App\Classes\App\AppClass;
use App\Http\Requests\SettingsRequest;
use App\Models\User;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(SettingsRequest $request)
    {
        $user = User::find(auth()->id());

        $user->update($request->validated());

        if ($request->has('new_password') && $request->input('new_password') !== null) {
            $user->update(['password' => bcrypt($request->input('new_password'))]);
        }

        AppClass::addMessage("Zmiany zostały zapisane");

        return response()->json(route('settings.form'));
    }
}
