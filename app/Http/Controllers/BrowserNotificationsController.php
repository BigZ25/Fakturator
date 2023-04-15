<?php

namespace App\Http\Controllers;

use App\Models\BrowserNotification;
use Illuminate\Http\Request;

class BrowserNotificationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $browserNotifications = BrowserNotification::query()
            ->where('user_id', '=', auth()->id())
            ->where('was_showed', '=', 0)
            ->select(['id', 'title', 'content', 'link'])
            ->get();

        return response()->json($browserNotifications);
    }

    public function update(Request $request, $id)
    {
        $browserNotification = BrowserNotification::find($id);

        if ($browserNotification) {
            $browserNotification->update([
                'was_showed' => 1,
            ]);
        }

        return response()->json();
    }
}
