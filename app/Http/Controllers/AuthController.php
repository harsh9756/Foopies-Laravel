<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $req){
        // validation
        $fields=$req->validate([
            'username'=>['required','max:255'],
            'name'=>['required','max:255'],
            'email'=>['required','email'],
            'password'=>['required','max:255','min:8','confirmed']
        ]);
        // creation
        $user=User::create($fields);
        // login
        Auth::login($user);

        return redirect('/');
    }
    public function login(Request $req){
        $fields=$req->validate([
            'email'=>['required','email'],
            'password'=>['required','max:255','min:8']
        ]);
        if (Auth::attempt($fields)) {
            return redirect('/');
        } else {
            $err = 'Incorrect Password.';
            return redirect('login')->with('err', $err);
        }
    }
    public function edit(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,',
            'email' => 'required|string|email|max:255|',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
}
