<?php
require_once 'vendor/autoload.php';

session_start();

// Config
$clientID = '';
$clientSecret = '';
$redirectUri = 'http://localhost/focusclass/';

$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    // Get user profile info
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();

    $_SESSION['user'] = [
        'name' => $google_account_info->name,
        'email' => $google_account_info->email,
        'picture' => $google_account_info->picture
    ];

    header('Location: index.php');
    exit();
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Google Login with PHP</title>
</head>
<body>
    <?php if (isset($_SESSION['user'])): ?>
        <h3>Welcome <?= $_SESSION['user']['name'] ?></h3>
        <p>Email: <?= $_SESSION['user']['email'] ?></p>
        <img src="<?= $_SESSION['user']['picture'] ?>" alt="Profile Picture" width="100">
        <p><a href="?logout=true">Logout</a></p>
    <?php else: ?>
        <a href="<?= $client->createAuthUrl() ?>">Login with Google</a>
    <?php endif; ?>
</body>
</html>
