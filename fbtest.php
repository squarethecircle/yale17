<?php
	require 'fbphpsdk/facebook.php';

	$facebook = new Facebook(array(
		'appId'  => '642157445814007',
		'secret' => '06079d477192bad968a74b4aebc268bb',
	));

	$user = $facebook->getUser();
	if ($user) {
		try {
			// User is logged in.
			//$user_profile = $facebook->api('/me');
			$logoutUrl = $facebook->getLogoutUrl();
		} catch (FacebookApiException $e) {
			// User is not logged in.
			$loginUrl = $facebook->getLoginUrl();
			$user = null;
		}
	}

?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>php-sdk</title>
    <style>
      body {
        font-family: 'Lucida Grande', Verdana, Arial, sans-serif;
      }
      h1 a {
        text-decoration: none;
        color: #3b5998;
      }
      h1 a:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body>
    <?php if ($user): ?>
      <h3>You</h3>
      <img src="https://graph.facebook.com/<?php echo $user; ?>/picture">
    <?php else: ?>
      Login to verify that you are a member of the Yale College Class of 2017. <br />
      <fb:login-button size="xlarge" show-faces="true"></fb:login-button>
    <?php endif ?>

    <div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId: '<?php echo $facebook->getAppID() ?>',
          cookie: true,
          xfbml: true,
          oauth: true
        });
        FB.Event.subscribe('auth.login', function(response) {
          window.location.reload();
        });
        FB.Event.subscribe('auth.logout', function(response) {
          window.location.reload();
        });
      };
      (function() {
        var e = document.createElement('script'); e.async = true;
        e.src = document.location.protocol +
          '//connect.facebook.net/en_US/all.js';
        document.getElementById('fb-root').appendChild(e);
      }());
    </script>
    
  </body>
</html>
