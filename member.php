<?php 
	session_start();
	require_once 'php/db.php';
?>


<?php
	if(empty($_SESSION['upload_agree']) || $_SESSION['upload_agree'] !== TRUE){header('Location: index.php');
	}
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
	<title>業者照片上傳│Tripmatch自遊配</title>	
	<link rel="shortcut icon" href="img/favicon.ico"/>
	<link rel="bookmark" href="img/favicon.ico"/>
	<link href="css/reset.css" rel="stylesheet">
	<link rel="stylesheet" href="css/alertify.core.css" />
	<link rel="stylesheet" href="css/alertify.default.css" />
	<link href="css/uploadfile.css" rel="stylesheet">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="js/jquery.uploadfile.min.js"></script>
	<script src="js/alertify.min.js"></script>
	<link href="css/style.css" rel="stylesheet">
	
	<script>
	$(document).ready(function()
    {
    	$("#fileuploader").uploadFile({
    		url:"upload.php",
    		fileName:"myfile"
    	});
    });
    </script>
</head>
	<body>
		<div class="topbar">
			<h1>TripMatch自遊配 業者照片上傳系統</h1>
			
		</div>
		<div class="conent">
			<p class="logout"><a href="php/logout"><<登出系統>></a></p>
			<div class="prompt">
				<p>親愛的 <?php echo $_SESSION['user']['name']?> 您好 以下訊息提醒您：</p><hr>
				<p>
					<ul>
						<li>1. 檔案上傳僅接受.jpg/jpeg .png .png檔案格式。</li>
						<li>2. 請勿上傳相同檔案名稱照片，必免覆蓋檔案。</li>
					</ul>
				</p>

			</div>




			<div id="fileuploader">Upload</div>

		</div>
	

	</body>
</html>