<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginCheck
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $target = Admin::where('email', $request->email)->first();

        if (!$target){
            return redirect()->route('admin')->with('msg', '<div class="alert alert-warning" id="alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>Sorry! </strong>User Not Found!
                        </div>');
        }
        $user = Hash::check($request->password,$target->password);

        if ($user){
            session([
                'role' => $target->role,
                'id' => $target->id,
                'email' => $target->email,
                'user_name' => $target->name,
            ]);
            if ($target->role == 1) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('admin')->with('msg', '<div class="alert alert-warning" id="alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>Sorry! </strong> Something is wrong!
                        </div>');
            }

        }
        else {
            return redirect()->route('admin')->with('msg', '<div class="alert alert-warning" id="alert">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <strong>Sorry! </strong> Email or password is incorrect!!!
                        </div>');
        }
    }
}
