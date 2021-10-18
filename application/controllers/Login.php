<?php

/**
 * TechniqueFinder - Login.php
 *
 * Description:
 * Author:           Intersect Australia Ltd
 * Created:          12 Aug 2019
 * Source:           https://github.com/IntersectAustralia/TechniqueFinder
 * License:          Copyright (c) 2019 Intersect Australia - Licensed under Creative Commons
 *                   Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)
 *                   https://creativecommons.org/licenses/by-nc-sa/4.0/
 */

require './application/third_party/vendor/autoload.php';

use Auth0\SDK\Auth0;

class Login extends CI_Controller
{
    private Auth0 $auth0;

    public function __construct()
    {
        parent::__construct();
        $this->setupAuth0();
    }

    public function setupAuth0(): void
    {
        $this->auth0 = new Auth0([
            'domain' => 'dev-68ut2myz.us.auth0.com',
            'client_id' => 'ubyDQgyXX9U4vQSETnCmgzQHB8PLQWEf',
            'client_secret' => 'XUpVeA315JxtukFrmSaAwLUj4oLiG0R10eogxef701-k6ucwXrfm4rfCkKOvuy8N',
            'redirect_uri' => 'http://web.local:8080/callback',
            // 'domain' => 'dev-csiro.au.auth0.com',
            // 'client_id' => 'kWEhhcCcuFlF5QZsIVnocssVFZ9oFhrM',
            // 'client_secret' => 'Vd0Z_zbcIdR9vrpys3ihrXHJlmSdJfAU8JihpC0AHWFz4AqZbvi09l91fgKBtCx2',
            // 'redirect_uri' => 'https://labfinder.geoanalytics.group/callback',
        ]);
    }

    public function onLoginRoute()
    {
        $this->auth0->deleteAllPersistentData();
        $url = $this->auth0->login();
        header('Location: ' . $url, true, 303);
    }

    public function onCallbackRoute()
    {
        $this->auth0->exchange();
        $user = $this->session->userdata('auth0__user');
        if ($user['email_verified'] && $user['email'] == 'laughinglyl90@gmail.com') {
            header('Location: ' . '/TechniqueFinder/index', true, 303);
        } else {
            $this->session->sess_destroy();
            $this->auth0->logout();
            $this->auth0->deleteAllPersistentData();
            echo '<script>let r=alert("You do not have the access permit, Please contact the admin")</script>';
            echo '<script> if (r == true) {</script>';
            echo '<script>window.location.href="https://dev-68ut2myz.us.auth0.com/v2/logout?client_id=ubyDQgyXX9U4vQSETnCmgzQHB8PLQWEf&returnTo=http://web.local:8080/Portal"</script>';
            // echo '<script>window.location.href="https://dev-csiro.au.auth0.com/v2/logout?client_id=kWEhhcCcuFlF5QZsIVnocssVFZ9oFhrM&returnTo=https://labfinder.geoanalytics.group/Portal"</script>';
            echo '<script>}</script>';
        }
    }


    public function onLogoutRoute()
    {
        $this->session->sess_destroy();
        $this->auth0->logout();
        $this->auth0->deleteAllPersistentData();
        redirect('https://dev-68ut2myz.us.auth0.com/v2/logout?client_id=ubyDQgyXX9U4vQSETnCmgzQHB8PLQWEf&returnTo=http://web.local:8080/Portal');
        // labfinder
        // redirect('https://dev-csiro.au.auth0.com/v2/logout?client_id=kWEhhcCcuFlF5QZsIVnocssVFZ9oFhrM&returnTo=https://labfinder.geoanalytics.group/Portal');
    }

}
