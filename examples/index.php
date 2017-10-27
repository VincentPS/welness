<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR. 'vendor/autoload.php';

$server = new \techgyani\OAuth1\Client\Server\Garmin([
    'identifier' => getenv('consumerKey'),
    'secret' => getenv('consumerSecret'),
    'callback_uri' => getenv('callback_uri')
]);
//1st part fetching temporary credentials
$temporaryCredentials = $server->getTemporaryCredentials();
$_SESSION['temporary_credentials'] = serialize($temporaryCredentials);
session_write_close();
// Second part of OAuth 1.0 authentication is to redirect the resource owner to the login screen on the server.
$server->authorize($temporaryCredentials);
