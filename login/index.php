<?php
//include google api files
	require_once '../includes/credentials.php';
	require_once 'Google/autoload.php';

	//start session
	/*if ($_SESSION["sessionstart"] <> 1){
		header('Location: ' . $base_url);	
}*/
	session_start();
	$gClient = new Google_Client();
	$gClient->setApplicationName('RECMe');
	$gClient->setClientId($google_client_id);
	$gClient->setClientSecret($google_client_secret);
	$gClient->setRedirectUri($google_redirect_url);
	$gClient->setDeveloperKey($google_developer_key);
	$gClient->setHostedDomain($email_domain);
	$gClient->setApprovalPrompt("auto");
	$gClient->setAccessType("online");
	$gClient->addScope('profile');
	$gClient->addScope('email');
	//$gClient->addScope('openid');
	//If user wish to log out, we just unset Session variable
	if (isset($_REQUEST['logout']))
	{

	 	$gClient->revokeToken();
	 	unset($_SESSION['token']);
		unset($_SESSION['user_id']);
		unset($_SESSION['user_email']);
		
	 	header('Location: ' . filter_var($base_url, FILTER_SANITIZE_URL)); //redirect user back to page
	 	return;
	}
	//If code is empty, redirect user to google authentication page for code.
	//Code is required to aquire Access Token from google
	//Once we have access token, assign token to session variable
	//and we can redirect user back to page and login.

	if (isset($_SESSION['token'])) 
	{ 
		$gClient->setAccessToken($_SESSION['token']);
		$token=$_SESSION['token'];
		$json_a=json_decode($token,true);
		$ticket = $gClient->verifyIdToken($json_a["id_token"]);
	  	if ($ticket)
		{
				$data = $ticket->getAttributes();
	    		$user_id = $data['payload']['sub']; // user ID
	    		$user_email = $data['payload']['email'];
	    		$user_hd = $data['payload']['hd']; 
	    		$_SESSION['user_id']=$data['payload']['sub'];
	    		$_SESSION['user_email']=$data['payload']['email']; 
	    		//var_dump($data);
	    		//var_dump($_SESSION);
	  			//echo $user_id;
				//$user_id 	= $user['id'];	
	  			header('Location: ' . filter_var($base_url, FILTER_SANITIZE_URL)); //redirect user back to page
	  			return;
		}
		
	}		
	else
	{
		if (isset($_GET['code'])) //if the user is redirected after login
		{ 
			$gClient->authenticate($_GET['code']);
			$_SESSION['token'] = $gClient->getAccessToken();
			header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL));
			return;
		}
		else 
		{
			//For Guest user, get google login url
			$authUrl = $gClient->createAuthUrl();
			header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
			return;
		}
	}
?>