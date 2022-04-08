<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function self_show () {
        $user = Auth::user();
        return view ('users.self_show', [
            'user' => $user
        ]);
    }

public function self_edit()
    {   
        $user = Auth::user();
        return view('users.self_edit', [
            'user' => $user
        ]);
    }
    public function self_update(Request $request, User $user)
    {   
        $user->update($request->input());
        return redirect('/user/self_show');
    }

    public function update_avt(Request $request, User $user)
    {   
        if($request->hasFile('avatar'))
        {
            $file = $request->file('avatar');
            $name = time().".".$file->getClientOriginalExtension();
            Image::make($file)->resize(300,300)->save( public_path("/uploads/avatars/".$name));
            $user->update([
                'avatar' => $name
            ]);
        }
        return redirect('/user/self_edit');
    }
}