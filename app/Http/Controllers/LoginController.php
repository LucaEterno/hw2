<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;

class LoginController extends BaseController
{
    public function welcome()
    {
        if(Session::get('user_id'))
        {
            return redirect('home');
        }
        return view('welcome');
    }

    public function login_form()
    {
        if(Session::get('user_id'))
        {
            return redirect('home');
        }
        $error = Session::get('error');
        Session::forget('error');
        return view('login')->with('error', $error);
    }

    public function do_login()
    {
        if(Session::get('user_id'))
        {
            return redirect('home');
        }

        if (!empty(request('username')) && !empty(request('password'))){
            $user = User::where('username', request('username'))->first();
            if(!$user || !password_verify(request('password'), $user->password))
            {
                Session::put('error', 'wrong');
                return redirect('login')->withInput();
            }
        } else {
            Session::put('error', 'empty_fields');
            return redirect('login')->withInput();
        }

        Session::put('user_id', $user->id);
        return redirect('home');
    }

    public function register_form()
    {
        if(Session::get('user_id'))
        {
            return redirect('home');
        }
        $error = Session::get('error');
        Session::forget('error');
        return view('register')->with('error', $error);
    }

    public function do_register()
    {
        if(Session::get('user_id'))
        {
            return redirect('home');
        }

        if (!empty(request('username')) && !empty(request('email'))  && !empty(request('password')) && !empty(request('confirm_password'))){

            //USERNAME
            if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', request('username'))) {
                Session::put('error', 'valid_username');
                return redirect('register')->withInput();
            } else if(User::where('username', request('username'))->first()) {
                Session::put('error', 'existing_username');
                return redirect('register')->withInput();
            }

            //EMAIL
            if (!filter_var(request('email'), FILTER_VALIDATE_EMAIL)) {
                Session::put('error', 'valid_email');
                return redirect('register')->withInput();
            } else if(User::where('email', request('email'))->first()) {
                Session::put('error', 'existing_email');
                return redirect('register')->withInput();
            }
            
            //PASSWORD
            if (strlen(request('password')) < 8) {
                Session::put('error', 'short_password');
                return redirect('register')->withInput();
            } else if ((!preg_match('/[A-Z]/', request('password'))) || (!preg_match('/[a-z]/', request('password'))) || (!preg_match('/[0-9]/', request('password'))))
            {
                Session::put('error', 'valid_password');
                return redirect('register')->withInput();
            }

            //CONFERMA PASSWORD
            if (strcmp(request('password'), request('confirm_password')) != 0) {
                Session::put('error', 'valid_confirm');
                return redirect('register')->withInput();
            }

        } else {
            Session::put('error', 'empty_fields');
            return redirect('register')->withInput();
        }

        $user = new User;
        $user->username = request('username');
        $user->atype = request('type');
        $user->password = password_hash(request('password'), PASSWORD_BCRYPT);
        $user->email = request('email');
        $user->propic = request('rpicture');
        $user->save();

        Session::put('user_id', $user->id);
        return redirect('home');
    }

    public function check_username($username)
    {
        return json_encode(array('exists' => User::where('username', $username)->first() != null ? true : false));    
    }
    
    public function check_email($email)
    {
        return json_encode(array('exists' => User::where('email', $email)->first() != null ? true : false)); 
    }

    public function logout() {
        Session::flush();
        return redirect('login');
    }
}
