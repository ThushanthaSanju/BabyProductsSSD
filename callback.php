<?php
require  __DIR__ . '/vendor/autoload.php';

use League\OAuth2\Client\Provider\Google;
//use League\OAuth2\Client\Google;

// Now you can use the Google provider class in your script
$provider = new Google([
    'clientId'     => '316309972127-6om911rfqpeghblo6gcet4sk84nkkv4u.apps.googleusercontent.com',
    'clientSecret' => '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',
    'redirectUri'  => 'http://localhost:8080/ShanBabyProducts/index/index.php',
]);

// Handle the OAuth callback
if (!isset($_GET['code'])) {
    // Step 1: Redirect the user to the OAuth provider's login page
    $authUrl = $provider->getAuthorizationUrl();
    $_SESSION['oauth2state'] = $provider->getState();
    header('Location: ' . $authUrl);
    exit;
} elseif (empty($_GET['state']) || ($_GET['state'] !== $_SESSION['oauth2state'])) {
    // Handle the mismatched state (security feature)
    unset($_SESSION['oauth2state']);
    exit('Invalid state');
} else {
    // Step 2: Exchange the authorization code for an access token
    $token = $provider->getAccessToken('authorization_code', [
        'code' => $_GET['code'],
    ]);

    // Step 3: Use the access token to fetch the user's profile from the OAuth provider
    try {
        $user = $provider->getResourceOwner($token);
        // You can now use $user->getEmail(), $user->getName(), etc.
        // to get user information and authenticate the user in your application.
    } catch (Exception $e) {
        exit('Failed to get user details');
    }
}