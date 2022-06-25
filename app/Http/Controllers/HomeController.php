<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;
use App\Models\Event;

class HomeController extends BaseController
{
    public function home()
    {
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }
        $user = User::find(Session::get('user_id'));
        return view('home')->with('user', $user);
    }

    public function list()
    {
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }
        $events = Event::all();
        return $events;
    }

    public function filteredList($type)
    {
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }

        if ($type =='Tutti'){
            $events = Event::all();
            return $events;
        } else if($type =='Followed'){
            $user = User::find(Session::get('user_id'));
            return $user->follows;
        } else {
            $events = Event::where("tipo", $type)->get();
            return $events; 
        }
    }

    public function getInfo($id)
    {
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }

        $event = Event::find($id);
        if ($event === null){
            return [];
        }
        return $event;
    }

    public function getFollower($id)
    {
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }

        $event = Event::find($id);
        if ($event === null){
            return [];
        }
        return json_encode(array('follower' => count($event->follows)));
    }

    public function follow_add($id)
    {
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }

        $event = Event::find($id);
        if ($event === null){
            return [];
        }
        
        $date=strtotime($event->data);
        $diff= time() - $date;
        if ( $diff > 86399  ){
            return [];
        }
        $user = User::find(Session::get('user_id'));
        return json_encode(array('ok' => $event->follows()->attach($user->id) == 0 ? true : false));
    }

    public function follow_remove($id)
    {
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }

        $event = Event::find($id);
        if ($event === null){
            return [];
        }

        $date=strtotime($event->data);
        $diff= time() - $date;
        if ( $diff > 86399  ){
            return [];
        }
        $user = User::find(Session::get('user_id'));
        return json_encode(array('ok' => $event->follows()->detach($user->id) != 0 ? true : false));
    }
}
