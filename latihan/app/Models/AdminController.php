<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminController extends Model
{
   public function login()
    {
        return view('login.login');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

}
