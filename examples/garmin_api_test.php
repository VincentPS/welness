<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR. 'vendor/autoload.php';


$server = new \techgyani\OAuth1\Client\Server\Garmin([
    'identifier' => getenv('consumerKey'),
    'secret' => getenv('consumerSecret'),
    'callback_uri' => getenv('callback_uri'),
]);


$params = [
    "uploadStartTimeInSeconds" => '1509022236',
    "uploadEndTimeInSeconds" => '1509108636'
];

$activitySummary = $server->getActivitySummary(unserialize($_SESSION['token_credentials']), $params);
print_r(json_decode($activitySummary));
