<?php
$helper = $fb->getRedirectLoginHelper();

$permissions = ['email','public_profile','publish_pages','manage_pages']; // Optional permissions
$loginUrl = $helper->getLoginUrl(BASEURL.'callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';