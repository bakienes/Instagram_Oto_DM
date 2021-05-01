<!DOCTYPE html>
<html>
<head>
    <title>oto post silici ıso.beyz</title>
</head>
<body>
  <center style="height: 50px;width: 40%;padding-left: 25%;line-height: 50px">
      <fieldset > 
        <form method="post">
          <input type="text" name="username" id="username" placeholder="username" onautocomplete="off">
          <br>
          <input type="password" name="password" id="password" placeholder="password">
          <br>
          <input type="number" name="no" id="no" placeholder="silinicek post sayısı">
          <br>
          <input type="submit" name="submit" id="button">
      </form>
      </fieldset>
  </center>
</body>
</html>
<?php

use InstagramAPI\Exception\ChallengeRequiredException;
use InstagramAPI\Instagram;
use InstagramAPI\Response\LoginResponse;

require __DIR__ . '/vendor/autoload.php';

//Enter these options
$username            = 'isobeyz';
$password            = 'shadow12x';
$verification_method = 0; //0 = SMS, 1 = Email

//Leave these
$user_id      = '';
$challenge_id = '';

class ExtendedInstagram extends Instagram {
	public function changeUser( $username, $password ) {
		$this->_setUser( $username, $password );
	}
}

function readln( $prompt ) {
	if ( PHP_OS === 'WINNT' ) {
		echo "$prompt ";

		return trim( (string) stream_get_line( STDIN, 6, "\n" ) );
	}

	return trim( (string) readline( "$prompt " ) );
}

$instagram = new ExtendedInstagram();

try {
	$loginResponse = $instagram->login( $username, $password );
	$user_id       = $instagram->account_id;

	if ( $loginResponse !== null && $loginResponse->isTwoFactorRequired() ) {
		echo '2FA not supported in this example';
		exit;
	}

	if ( $loginResponse instanceof LoginResponse || $loginResponse === null ) {
		echo "Not a challenge required exception...\n";
	}

	echo 'Logged in!';
} catch ( Exception $exception ) {
	/** @var LoginResponse $response */
	if ( ! method_exists( $exception, 'getResponse' ) ) {
		echo $exception->getMessage();
		exit;
	}
	$response = $exception->getResponse();

	if ( $exception instanceof ChallengeRequiredException ) {
		sleep( 5 );

		$customResponse = $instagram->request( substr( $response->getChallenge()->getApiPath(), 1 ) )->setNeedsAuth( false )->addPost( 'choice', $verification_method )->getDecodedResponse();

		if ( is_array( $customResponse ) ) {
			$user_id      = $customResponse['user_id'];
			$challenge_id = $customResponse['nonce_code'];
		} else {
			echo "Weird response from challenge request...\n";
			var_dump( $customResponse );
			exit;
		}
	} else {
		echo "Not a challenge required exception...\n";

		var_dump( $exception );
		exit;
	}

	try {
		$code = readln( 'Code that you received via ' . ( $verification_method ? 'email' : 'sms' ) . ':' );
		$instagram->changeUser( $username, $password );
		$customResponse = $instagram->request( "challenge/$user_id/$challenge_id/" )->setNeedsAuth( false )->addPost( 'security_code', $code )->getDecodedResponse();

		if ( ! is_array( $customResponse ) ) {
			echo "Weird response from challenge validation...\n";
			var_dump( $customResponse );
			exit;
		}

		if ( $customResponse['status'] === 'ok' && (int) $customResponse['logged_in_user']['pk'] === (int) $user_id ) {
			echo 'Finished, logged in successfully! Run this file again to validate that it works.';
		} else {
			echo "Probably finished...\n";
			var_dump( $customResponse );
		}
	} catch ( Exception $ex ) {
		echo $ex->getMessage();
	}
}