<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Session;
use App\Models\User;

class SpotifyController extends BaseController
{
    public function spotify()
    {
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }
        $user = User::find(Session::get('user_id'));
        return view('spotify')->with('user', $user);
    }

    public function api($type, $track=null)
    {
        if(!Session::get('user_id'))
        {
            return redirect('login');
        }

        // Richiesta token
        $client_id = env('SPOTIFY_CLIENT_ID');
        $client_secret = env('SPOTIFY_CLIENT_SECRET');
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://accounts.spotify.com/api/token");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        $headers = array("Authorization: Basic ".base64_encode($client_id.":".$client_secret));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        $token = json_decode($result)->access_token;
        curl_close($ch);

        switch($type) {
            case 'cerca':
                $url = 'https://api.spotify.com/v1/search?type=track&q='.urlencode($track);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                $headers = array("Authorization: Bearer ".$token);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $res=curl_exec($ch);
                curl_close($ch);
                return $res;
                break;

            case 'playlist':
                $url = 'https://api.spotify.com/v1/playlists/3umpWOkoOPRBgf30lxVbmd';
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                $headers = array("Authorization: Bearer ".$token);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $res=curl_exec($ch);
                curl_close($ch);
                return $res;
                break;

            default: break;
        }
    }
}