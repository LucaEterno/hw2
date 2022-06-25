<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;
use App\Models\Track;

define('URL_T', 'https%3A%2F%2Fopen.spotify.com%2Ftrack%2F');
//define('URL_C', 'https%3A%2F%2Fi.scdn.co%2Fimage%2F');

class PrefController extends BaseController
{
    public function preferiti()
    {
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }
        $user = User::find(Session::get('user_id'));
        return view('preferiti')->with('user', $user);
    }

    public function list()
    {
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }
        $user = User::find(Session::get('user_id'));
        $tracks = Track::where("user_id", $user->id)->get();
        return $tracks;
    }

    public function exist($url)
    {
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }
        $url = URL_T.$url;
        $user = User::find(Session::get('user_id'));
        $track = Track::where("canzone", $url)->where("user_id", $user->id)->get();
        return $track;
    }

    /*
    public function getAdd($url, $cover){
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }
        $url = URL_T.$url;
        $cover = URL_C.$cover;
        $user = User::find(Session::get('user_id'));
        $track = new Track;
        $track->canzone = $url;
        $track->img = $cover;
        $track->user_id = $user->id;
        $track->save();
        return json_encode(array('ok' => $track != null ? true : false));
    }
    */

    public function postAdd(){
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }
        $user = User::find(Session::get('user_id'));
        $track = new Track;
        $track->canzone = request('url');
        $track->img = request('img');
        $track->user_id = $user->id;
        $track->save();
        return json_encode(array('ok' => $track != null ? true : false));
    }

    public function remove($url){
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }
        $url = URL_T.$url;
        $user = User::find(Session::get('user_id'));
        $track = Track::where("canzone", $url)->where("user_id", $user->id)->first();
        if ($track === null){
            return [];
        }

        $istanza = Track::find($track->id);
        $istanza->delete();
        return json_encode(array('ok' => $istanza != null ? true : false));
    }
}