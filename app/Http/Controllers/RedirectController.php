<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function cek()
    {
        if (auth()->user()->role_id == 1) {
            return redirect('/Superadmin');
        } elseif (auth()->user()->role_id == 2) {
            return redirect('/Dashboard-bidang');
        } elseif (auth()->user()->role_id == 3) {
            return redirect('/Dashboard-admin');
        }
    }
}
