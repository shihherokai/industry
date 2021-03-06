<?php 
	session_start();
	require_once 'db.php';
	require_once 'functions.php';


		 require('../recaptcha/src/autoload.php');
 // _GOOGLE_RECAPTCHA_SEC_KEY 就是 google 給的 Secret Key
 $recaptcha = new \ReCaptcha\ReCaptcha("6LfpvxYUAAAAAPa6aeFqtDJN6Xlml9zA7Xj2lEtE");
 $gRecaptchaResponse = $_POST['g-recaptcha-response'];
 $remoteIp = $_SERVER['REMOTE_ADDR'];
 $resp = $recaptcha->verify($gRecaptchaResponse, $remoteIp);
 if(!$resp->isSuccess()){
 	echo '請先證明您不是機器人';
 	return;
 }
?>

<?php
if(isset($_POST['user']) && !empty($_POST['user']))
	{
		//驗證登入
		$has_user = login($_POST['user']);
		//直接判別
		if($has_user) //使用者帳號密碼正確
		{
			$get_user_information = get_user_information($_POST['user']);
			$_SESSION['user']['id'] = $get_user_information['id'];
			$_SESSION['user']['tel'] = $get_user_information['tel'];
			$_SESSION['user']['name'] = $get_user_information['name'];
			$_SESSION['upload_agree'] = TRUE;
		}
		else
		{
			$_SESSION['upload_agree'] = FALSE;
			$_SESSION['msg'] = '帳號密碼錯誤，請再次確認帳密。';
		}
	}
	//使用php header 來轉址 返回登入頁
	header('Location: ../index.php');

?>

<?php 
	if(isset($_SESSION['upload_agree']) && $_SESSION['upload_agree'] == TRUE){header('Location: ../member.php');}
	if(isset($_SESSION['upload_agree']) && $_SESSION['upload_agree'] == FALSE){header('Location: ../index.php?msg=error');}
?>