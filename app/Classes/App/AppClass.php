<?php

namespace App\Classes\App;

use Illuminate\Support\Facades\Session;

class AppClass
{
    public static function addMessage($content)
    {
        Session::flash('message', ['type' => 'success', 'content' => $content]);
    }

    public static function addWarning($content)
    {
        Session::flash('message', ['type' => 'info', 'content' => $content]);
    }

    public static function addError($content)
    {
        Session::flash('message', ['type' => 'error', 'content' => $content]);
    }
}
