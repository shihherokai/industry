<?php 
	session_start();
	require_once 'php/db.php';


 

?>

<?php
// 註冊或查詢你的 API Keys: https://www.google.com/recaptcha/admin
$siteKey = '6LfpvxYUAAAAAKpBD27j24fXKmwPqiCtMA3YrgO_';

// 所有支援的語系: https://developers.google.com/recaptcha/docs/language
$lang = 'zh-TW';
?>

 
<?php if(isset($_GET['msg']) && $_GET['msg'] == "error"){ 
	echo "<script language='javascript'>alert('資料驗證失敗');</script>";
	
} ?>

<?php
	if(isset($_SESSION['upload_agree']) && $_SESSION['upload_agree'] == TRUE){header('Location: member.php');}
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
	<title>業者照片上傳│Tripmatch自遊配</title>
	<link rel="stylesheet" href="css/alertify.core.css" />
	<link rel="stylesheet" href="css/alertify.default.css" />
	<script src="js/alertify.min.js"></script>
	<link href="css/reset.css" rel="stylesheet">
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<link href="css/style.css" rel="stylesheet">
	<link rel="shortcut icon" href="img/favicon.ico"/>
	<link rel="bookmark" href="img/favicon.ico"/>




</head>






<body>
		<div class="login_logo">
			<img src="img/logo.png" alt="">
			<div class="login_form">
				<form action="php/logon.php" name="login" method="post">
					<label for="">使用者編號</label>
					<input type="Tel" name="user" onkeyup="return ValidateNumber(this,value)" />
					<label>機器人驗證</label>
					<div class="recbot">
					<span><div class="g-recaptcha" data-sitekey="6LfpvxYUAAAAAKpBD27j24fXKmwPqiCtMA3YrgO_"></div></span></div>
						
					<button type="button" onClick="check()">進入系統</button>
				</form>
			</div>
		</div>

	<script>
	function check()
	{
		if(login.user.value == "") 
		{
			alertify.alert("資料填寫不完整");
		}

		else 
		{
			login.submit();
		}
	}
	function ValidateNumber(e, pnumber)
{
    if (!/^\d+$/.test(pnumber))
    {
        e.value = /^\d+/.exec(e.value);
    }
    return false;
}



  </script>

</body>





</html>