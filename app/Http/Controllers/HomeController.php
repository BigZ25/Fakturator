<?php

namespace App\Http\Controllers;

use App\Classes\App\AppClass;
use App\Models\Code;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('code') && $request->input('code') !== null) {
            $code = Code::updateOrCreate([
                'code' => $request->input('code'),
            ]);

            if (App::environment('local')) {
                AppClass::addWarning($code->code);
            } else {
                AppClass::addMessage('Kod dostępu do OLX został poprawnie dodany');
            }
        }

        return redirect(route('adverts.index'));
    }
}
