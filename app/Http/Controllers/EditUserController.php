<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class EditUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('user/edit');
    }

    public function updateProfile(Request $request)
    {
        if(isset($request->username))
            User::where('id', Auth::user()->id)->update(['name' => $request->username]);
        else if(isset($request->email))
            User::where('id', Auth::user()->id)->update(['email' => $request->email]);
        else if(isset($request->new_password) && isset($request->old_password) && isset($request->password_confirm))
        {
            if(Hash::check($request->old_password, auth()->user()->password))
            {
                if($request->new_password == $request->password_confirm)
                {
                    User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
                    return view('user/edit')->with(['password' => 'changed']);
                }
                else
                    return view('user/edit')->with(['password' => 'nonmatching']);
            }
            else
                return view('user/edit')->with(['password' => 'invalid']);
        }

        return redirect('profile');
    }
}