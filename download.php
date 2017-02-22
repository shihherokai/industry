<?php
if($_GET['file']!=null){
	$file=$_GET['file'];//檔案名稱
	$url="http://center.tripmatch.com.tw/update/uploads/"; //路徑位置
	header("Content-type: octet/stream");
	header("Content-type:application");
	header("Content-Disposition: attachment; filename=".$file);	
	ob_clean();
flush();
	readfile($file);	
	exit();
}else{
	echo "找不到相關檔案....";
}
?>
