<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|min:"3',
            'name' => 'required|min:3',
            'address' => 'required|min:6',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        $validated['password'] = bcrypt($validated['password']);
        
        User::create($validated);

        return back()->with('created', 'User Created Successfully');
    }

    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($validate)) {
            $request->session()->regenerate();

            return redirect('/')->with('authenticated', 'You are now logged in!');
        }

        return back()->withErrors(['username' => 'Invalid Credentials'])->onlyInput('username');
    }

    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('logout', 'You have been logged out!');

    }

    public function index()
    {
        if(!auth()->user()->isAdmin) {
            abort(403, 'Unauthorized Action');
        }

        return view('users.manage', [
            'users' => User::latest()->filter(request(['search']))->paginate(6)
        ]);
    }

    public function verify(User $user)
    {
        if(!auth()->user()->isAdmin) {
            abort(403, 'Unauthorized Action');
        }

        $user->update([
            'verified' => true
        ]);

        return back()->with('verified', 'Success');
    }

    public function destroy(User $user)
    {
        if(!auth()->user()->isAdmin) {
            abort(403, 'Unauthorized Action');
        }
        $user->delete();

        return back()->with('deleted', 'Success');
    }
}
