<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;
use App\Models\Event;

class EventController extends BaseController
{
    public function event_form()
    {
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }
        $user = User::find(Session::get('user_id'));
        $error = Session::get('error');
        Session::forget('error');
        return view('event')->with('user', $user)->with('error', $error);
    }

    public function add_event()
    {
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }

        if (!empty(request('type')) && !empty(request('descr'))  && !empty(request('data'))){

            //DATA
            $date=strtotime(request('data'));
            $diff= time() - $date;
            if ( $diff > 86399  ){
                Session::put('error', 'past');
                return redirect('add-event')->withInput();
            } else if ( $diff < -31536000){
                Session::put('error', 'future');
                return redirect('add-event')->withInput();
            }

        } else {
            Session::put('error', 'empty_fields');
            return redirect('add-event')->withInput();
        }

        $user = User::find(Session::get('user_id'));
        $event = new Event;
        $event->tipo = request('type');
        $event->descr = request('descr');
        $event->data = request('data');
        $event->user = $user->username;
        $event->save();

        return redirect('home');
    }
}