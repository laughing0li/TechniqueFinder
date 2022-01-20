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


// require './application/third_party/vendor/autoload.php';
// (Dotenv\Dotenv::createImmutable('application/third_party/'))->load();
require './vendor/autoload.php';
use Symfony\Component\Yaml\Yaml;
$secrets = Yaml::parse(file_get_contents('app.yaml'));
use Auth0\SDK\Auth0;

class LoginAuth0 extends CI_Controller
{
    private Auth0 $auth0;
    // $secrets = Yaml::parse(file_get_contents('app.yaml'));

    public function __construct()
    {
        parent::__construct();
        $this->setupAuth0();
    }
            
    public function setupAuth0(): void
    {
        global $secrets;

        $this->auth0 = new Auth0([
            'domain' => $secrets['env_variables']['AUTH0_DOMAIN'],
            'client_id' => $secrets['env_variables']['AUTH0_CLIENT_ID'],
            'client_secret' => $secrets['env_variables']['AUTH0_CLIENT_SECRET'],
            'redirect_uri' => $secrets['env_variables']['AUTH0_REDIRECT_URI'],
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
        global $secrets;

        $this->auth0->exchange();
        $user = $this->session->userdata('auth0__user');
        $admin_roles = explode(',', $secrets['env_variables']['ADMIN']);
        if ($user['email_verified'] &&  in_array($user['email'], $admin_roles)) {
        // if ($user['email_verified'] && $user['email'] == 'laughinglyl90@gmail.com') {
            header('Location: ' . '/TechniqueFinder/index', true, 303);
        } else {
            $this->session->sess_destroy();
            $this->auth0->logout();
            $this->auth0->deleteAllPersistentData();
            echo '<script>let r=alert("You do not have the access permit, Please contact the admin")</script>';
            echo '<script> if (r == true) {</script>';
            echo '<script>window.location.href="'.$secrets['env_variables']['AUTH0_LOGOUT_URI'].'"</script>';
            echo '<script>}</script>';
        }
    }


    public function onLogoutRoute()
    {
        global $secrets;

        $this->session->sess_destroy();
        $this->auth0->logout();
        $this->auth0->deleteAllPersistentData();
        redirect($secrets['env_variables']['AUTH0_LOGOUT_URI']);
    }

}
