<?PHP

$fb = new Facebook\Facebook([
  'app_id' => '{977899118936808}',
  'app_secret' => '{6bb9703847c2c90994ea86ee8e8e1ddd}',
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://example.com/fb-callback.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';


?>