<?php

/**
 * TechniqueFinder - Login-auth0.php
 * Integrated auth0 function
 * Description:
 * Author:           Intersect Australia Ltd
 * Created:          12 Aug 2019
 * Source:           https://github.com/IntersectAustralia/TechniqueFinder
 * License:          Copyright (c) 2019 Intersect Australia - Licensed under Creative Commons
 *                   Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)
 *                   https://creativecommons.org/licenses/by-nc-sa/4.0/
 */


require './application/third_party/vendor/autoload.php';
(Dotenv\Dotenv::createImmutable('application/third_party/'))->load();

use Auth0\SDK\Auth0;

class LoginAuth0 extends CI_Controller
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
            'domain' => $_ENV['AUTH0_DOMAIN'],
            'client_id' => $_ENV['AUTH0_CLIENT_ID'],
            'client_secret' => $_ENV['AUTH0_CLIENT_SECRET'],
            'redirect_uri' => $_ENV['AUTH0_REDIRECT_URI'],
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
        $admin_roles = explode(',', $_ENV['ADMIN']);
        if ($user['email_verified'] &&  in_array($user['email'], $admin_roles)) {
        // if ($user['email_verified'] && $user['email'] == 'laughinglyl90@gmail.com') {
            header('Location: ' . '/TechniqueFinder/index', true, 303);
        } else {
            $this->session->sess_destroy();
            $this->auth0->logout();
            $this->auth0->deleteAllPersistentData();
            echo '<script>let r=alert("You do not have the access permit, Please contact the admin")</script>';
            echo '<script> if (r == true) {</script>';
            echo '<script>window.location.href="'.$_ENV['AUTH0_LOGOUT_URI'].'"</script>';
            echo '<script>}</script>';
        }
    }


    public function onLogoutRoute()
    {
        $this->session->sess_destroy();
        $this->auth0->logout();
        $this->auth0->deleteAllPersistentData();
        redirect($_ENV['AUTH0_LOGOUT_URI']);
    }

}
