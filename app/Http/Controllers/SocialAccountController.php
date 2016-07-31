<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Guzzle;
use App\User;
use App\SocialAccount;

class SocialAccountController extends Controller
{
    public function redirect()
    {
        // api data
        $root = 'https://api.cc.ncu.edu.tw/oauth';
        $client_id = config('oauth.portal.client_id');
        $scope = 'user.info.basic.read';

        // redirect
        $url = $root . '/oauth/authorize?response_type=code&scope=' . $scope . '&client_id=' . $client_id;
        return redirect($url);
    }
    public function callback(Request $request)
    {
        // decline
        if(!isset($_GET['code'])){
            return redirect('/login');
        }

        // api data
        $root = 'https://api.cc.ncu.edu.tw/oauth';
        $client_id = config('oauth.portal.client_id');
        $client_secret = config('oauth.portal.client_secret');
        $url = $root . '/oauth/token';

        // request
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
        $data = json_decode($response->getBody());
        $request->session()->put('access_token', $data->{'access_token'});

        // get(or create) user and login it
        $user = $this->createOrGetUser($request);
        auth()->login($user);

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
        // api data
        $root = 'https://api.cc.ncu.edu.tw';
        $url = $root . '/personnel/v1/info';
        $access_token = $request->session()->get('access_token');

        // request
        $response = Guzzle::get(
            $url,
            [
                'headers'  => [ 'Authorization' => 'Bearer ' . $access_token ]
            ]
        );
        $data = json_decode($response->getBody());

        return $data;
    }
}
