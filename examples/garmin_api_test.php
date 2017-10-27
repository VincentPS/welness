<?php
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
    "uploadStartTimeInSeconds" => time(),
    "uploadEndTimeInSeconds" => time() + (24*60*60)
];

$activitySummary = $server->getActivitySummary(unserialize($_SESSION['token_credentials']), $params);
print_r(json_decode($activitySummary));
