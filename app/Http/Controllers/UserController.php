<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    public function self_update(UserRequest $request, User $user)
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



    public function show () {
        $users = DB::table('users')
        ->paginate(4);
        return view ('users.show', [
            'users' => $users
        ]);
    }

    public function show_user ($user) {
        $user = DB::table('users')
        ->where('users.id','=',$user)
        ->get();

        $user = $user[0];
        return view ('users.show_user', [
            'user' => $user
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/user/show');
    }

    public function update(User $user)
    {
        
        if ($user->role_id == '2')
        {
        $user->update([
            'role_id' => '1',
        ]); 
        return redirect("/user/show");
    }
        if ($user->role_id == '1')
        {
        $user->update([
            'role_id' => '2',
        ]);
        return redirect("/user/show");
    }
    
    }
}