<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Guzzle;
use App\User;
use App\SocialAccount;
use Auth;

class SocialAccountController extends Controller
{
    public function redirect(Request $request)
    {
        // try to login
        $access_token = $request->session()->get('access_token');
        $time = $request->session()->get('time');
        if ( isset($access_token) && isset($time) && $time > time() ) {
            $user = $this->createOrGetUser($request);
            Auth::login($user, true);
            return redirect('/');
        }

        // if never use or timeout -> start
        return $this->start();
    }
    public function start()
    {
        $root = 'https://api.cc.ncu.edu.tw/oauth';
        $client_id = config('oauth.portal.client_id');
        $scope = 'user.info.basic.read';
        $url = $root . '/oauth/authorize?response_type=code&scope=' . $scope . '&client_id=' . $client_id;
        return redirect($url);
    }
    public function callback(Request $request)
    {
        // decline
        if(!isset($_GET['code'])){
            return redirect('/login');
        }

        // api
        $root = 'https://api.cc.ncu.edu.tw/oauth';
        $client_id = config('oauth.portal.client_id');
        $client_secret = config('oauth.portal.client_secret');
        $url = $root . '/oauth/token';
        $response = Guzzle::post(
            $url,
            [
                'form_params' => [
                  'grant_type' => 'authorization_code',
                  'code' => $_GET['code'],
                  'client_id' => $client_id,
                  'client_secret' => $client_secret,
                ]
            ]
        );

        // error
        if ($response->getStatusCode() != 200) {
            return redirect('/login');
        }

        // no error, store data
        $data = json_decode($response->getBody());
        $request->session()->put('access_token', $data->{'access_token'});
        // $request->session()->put('refresh_token', $data->{'refresh_token'});
        $request->session()->put('time', time() + $data->{'expires_in'} );

        // get(or create) user and login it
        $user = $this->createOrGetUser($request);
        Auth::login($user, true);

        return redirect('/');
    }
    public function createOrGetUser(Request $request)
    {
        // return portal user info
        $portal = $this->getUserInfo($request);

        // retrive account
        $account = SocialAccount::whereProvider('portal')
            ->whereProviderUserId($portal->{'id'})
            ->first();
        // if exist
        if ($account) {
            return $account->user;
        } else {
            // no exist, create user
            $account = new SocialAccount([
                'provider_user_id' => $portal->{'id'},
                'provider' => 'portal'
            ]);
            $user = User::create([
                'email' => $portal->{'id'} . '@cc.ncu.edu.tw',
                'name' => $portal->{'name'},
                'real_name' => $portal->{'name'},
                'student_id' => $portal->{'id'},
                'unit' => $portal->{'unit'},
                'type' => $portal->{'type'}
            ]);

            // user attach general role
            $user->roles()->attach(\Caffeinated\Shinobi\Models\Role::where('name', 'General Users')->first()->id);

            // social_accounts associate to user
            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }
    public function getUserInfo(Request $request)
    {
        // api
        $root = 'https://api.cc.ncu.edu.tw';
        $url = $root . '/personnel/v1/info';
        $access_token = $request->session()->get('access_token');
        $response = Guzzle::get(
            $url,
            [
                'headers'  => [ 'Authorization' => 'Bearer ' . $access_token ]
            ]
        );

        // no error, return data
        $data = json_decode($response->getBody());
        return $data;
    }
    public function session_flush(Request $request)
    {
        $request->session()->forget('access_token');
        $request->session()->forget('time');
        // $request->session()->forget('refresh_token');
        // $request->session()->flush(); // all
        return back();
    }
}
