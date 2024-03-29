<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class LoginController
 * @package App\Http\Controllers\Auth
 */
class LoginController extends Controller
{
    /**
     * Make auth
     *
     * @return view auth
     */
    public function auth()
    {
        return view('auth');
    }

    /**
     * @param Request $request
     * @return redirect /main
     * @return redirect /login
     */
    public function valid(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->pass]))
        {
            session(['is_auth' => true]);
            return redirect('/main');
        } else {
            return redirect('/login');
        }

    }
}
