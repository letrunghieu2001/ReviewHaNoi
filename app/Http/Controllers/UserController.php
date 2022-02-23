<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function self_show () {
        $user = Auth::user();
        return view ('users.self_show', [
            'user' => $user
        ]);
    }
}
