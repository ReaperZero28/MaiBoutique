<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function signUp(){
        return view('signup');
    }

    public function signUpProcess(Request $req){
        $req->validate([
            'username' => 'required|min:5|max:20|unique:users,username',
            'email' => 'required|email:dns',
            'password' => 'required|min:5|max:20',
            'phone' => 'required|digits_between:10,13|numeric',
            'address' => 'required|min:5',
        ]);

        $newUser = User::create([
            'username' => $req->username,
            'email' => $req->email,
            'password' => bcrypt($req->password),
            'phone' => $req->phone,
            'address' => $req->address,
            'role' => 'member',
        ]);

        $newCart = Cart::create([
            'userId' => $newUser->id,
        ]);

        return redirect('/sign-in')->with('signupSession', 'Account was successfully created.');
    }

    public function signIn(){
        return view('signin');
    }

    public function signInProcess(Request $req){
        $credentials = $req->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:5|max:20',
        ]);

        $remember = $req->remember;

        if(Auth::attempt($credentials)){
            if($remember){
                Cookie::queue('email', $req->email, 5);
                Cookie::queue('password', $req->password, 5);
            }

            Session::put('signinSession', $credentials);

            return redirect('/home');
        }

        return redirect()->back()->with('signinSession', 'Login failed. Wrong email or password.');
    }

    public function signOut(){
        Auth::logout();
        Session::forget('signinSession');

        return redirect('/welcome');
    }

    public function profile(){
        $profile = User::find(auth()->id());

        return view('profile', ['profile'=>$profile]);
    }

    public function editProfileForm(){
        return view('editProfile');
    }

    public function editProfile(Request $req){
        $req->validate([
            'username' => 'required|min:5|max:20|unique:users,username',
            'email' => 'required|email:dns|unique:users,email',
            'phone' => 'required|digits_between:10,13|numeric',
            'address' => 'required|min:5',
        ]);

        $profile = User::find(auth()->id());

        $profile->username = $req->username;

        $profile->email = $req->email;

        $profile->address =$req->address;

        $profile->phone =$req->phone;

        $profile->save();

        return redirect('/profile')->with('homeSession', 'Profile was successfully updated.');
    }

    public function editPasswordForm(){
        return view('editPassword');
    }

    public function editPassword(Request $req){
        $req->validate([
            'oldPassword' => 'required|min:5|max:20',
            'newPassword' => 'required|min:5|max:20',
        ]);

        $profile = User::find(auth()->id());

        if(Hash::check($req->oldPassword, $profile->password)){
            $profile->password = bcrypt($req->newPassword);

            $profile->save();

            return redirect('/profile')->with('homeSession', 'Password was successfully updated.');
        }

        return redirect()->back()->with('homeSession', 'Incorrect old password.');
    }
}
