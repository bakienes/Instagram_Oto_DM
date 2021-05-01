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
/*
 * bu script iso.beyz tarafından kodlandı 
 * scrıpt ile oynama yapmayınız aksi halde calısmaybılır 
 */
set_time_limit(0);
date_default_timezone_set('UTC');
require '../data/data/autoload.php';
//////////////////////
\InstagramAPI\Instagram::$allowDangerousWebUsageAtMyOwnRisk = true;
$ig= new \InstagramAPI\Instagram();

/////// CONFIG ///////
$username = $_POST["username"]; //kullanıcı adı cekımı yapar
$password = $_POST["password"]; //şifre ceker
$no = $_POST['no']; // silcegı post 
///////////////////////////////
$debug = false; 
$truncatedDebug = false;
///////////////////////////////
$ig = new \InstagramAPI\Instagram($debug, $truncatedDebug);
/////////////////////////////////

use InstagramAPI\Exception\ChallengeRequiredException;
use InstagramAPI\Instagram;
use InstagramAPI\Response\LoginResponse;

try {  $ig->login($username,$password,); //USERNAME - PASSWORD
	} catch (\Exception $e) {
    echo 'login hata'.$e->getMessage()."\n";
    exit(0);
}

 try {

for ($i=0; $i < $no  ; $i++) { 


$media = $ig->timeline->getSelfUserFeed();
$json = json_decode($media ,true);
$arsiv = $json['items']['0']['pk'];
$ig->timeline->archiveMedia($arsiv);
}
}catch	(\Exception $e){
	echo $e->getMessage();
}



//Enter these options
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
			echo "okuma hatası.\n";
			var_dump( $customResponse );
			exit;
		}
	} else {
		echo "dogrulama yok\n";

		var_dump( $exception );
		exit;
	}

	try {
		$code = readln( 'aldıgınız kod ' . ( $verification_method ? 'email' : 'sms' ) . ':' );
		$instagram->changeUser( $username, $password );
		$customResponse = $instagram->request( "challenge/$user_id/$challenge_id/" )->setNeedsAuth( false )->addPost( 'security_code', $code )->getDecodedResponse();

		if ( ! is_array( $customResponse ) ) {
			echo "okuma hatası\n";
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
