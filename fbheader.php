<?php
	require 'fbphpsdk/facebook.php';
	define('USERLIST', 'userlist.list');

	$facebook = new Facebook(array(
		'appId'  => '642157445814007',
		'secret' => '06079d477192bad968a74b4aebc268bb',
	));

	$user = $facebook->getUser();
	$error = null;
	$ingroup = false;
	if ($user) {
		try {
			// User is logged in.
			// Check if part of Class of 2017 group.
			$groups = $facebook->api('me/groups?fields=id');
			foreach($groups['data'] as $group) {
				if ($group['id'] == 386287368059235) {
					$ingroup = true;
					$userlist = getusers();
					if(!in_array($user, $userlist)){
						array_push($userlist, $user);
						saveusers($userlist);
					}
					break;
				}
			}
			if (!$ingroup) {
				$error = 'You must be in the <a href="https://www.facebook.com/groups/386287368059235/">Yale College Class of 2017</a> group.';
			}
		} catch (FacebookApiException $e) {
			// User is not logged in.
			$loginUrl = $facebook->getLoginUrl();
			$error = "Not connected!";
			$user = null;
		}
	} else {
		$error = "Not connected!";
	}
	
	function isappuser($userid) {
		$r = $facebook->api(array(
        'method' => 'fql.query',
        'query' => "SELECT is_app_user FROM user WHERE uid=$userid"
    ));
		return $r[0]['is_app_user'];
	}
	function getusers() {
		if (file_exists(USERLIST)) {
			return file(USERLIST, FILE_IGNORE_NEW_LINES);
		} else {
			fclose(fopen(USERLIST, 'w'));
			return array();
		}
	}
	function saveusers($userlist) {
		$f = fopen(USERLIST, 'w');
		foreach($userlist as $user) {
			fwrite($f, $user.PHP_EOL);
		}
		fclose($f);
	}
?>