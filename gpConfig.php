<?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '923470245500-untorc9sr8nm3rvgn0mgi4a2ltqdopoj.apps.googleusercontent.com'; //Google client ID
$clientSecret = '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'; //Google client secret
$redirectURL = 'http://localhost/iniciar-sesion.php'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to ITESA');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
