<?php

namespace App\Classes\App;

use Illuminate\Support\Facades\Log;
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

//    public static function addLog($action): bool
//    {
//        $log = new Log();
//        $log->ip_address = request()->ip();
//        $log->user_id = auth()->id();
//        $log->action = $action;
//        $log->save();
//
//        return true;
//    }

//    public function addNotification($user_id, $entity_id, $module, $text, $sub_text)
//    {
//        Notification::create([
//            'user_id' => $user_id,
//            'entity_id' => $entity_id,
//            'module' => $module,
//            'text' => $text,
//            'sub_text' => $sub_text,
//            'was_viewed' => 0,
//            'datetime' => currentDateTime(),
//        ]);
//    }
}
