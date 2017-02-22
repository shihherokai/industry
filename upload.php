<?php 
	session_start();
	require_once 'php/db.php';
?>

<?php
$output_dir = "uploads/".$_SESSION['user']['tel']."/";

// 檢查目錄是否存在，不存在就建立
$cDir = $output_dir;
if (! is_dir ( $cDir )) {
mkdir ( $cDir, '0777' );
}

//副檔名限制
$limitedext = array("bmp","BMP","jpg","JPG","JPEG","jpeg","png","PNG");//設定可上傳的檔案類型(副檔名)

if(isset($_FILES["myfile"]))
{
	$ret = array();
		
	//判斷是單一或多個檔案上傳
	if(!is_array($_FILES["myfile"]["name"])) //單一檔案
	{
 	 	$fileName = urlencode($_FILES["myfile"]["name"]);

 	 	//判斷副檔名是否符合
		$File_Extension = explode(".", $_FILES['myfile']['name']); 
		$File_Extension = $File_Extension[count($File_Extension)-1];
		if(!in_array($File_Extension,$limitedext)){
		echo "不支援此檔案類型";
		exit;
		}
		//判斷副檔名是否符合


 		move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$fileName);
    	$ret[]= $fileName;
	}
	else  //多個檔案
	{
	  $fileCount = count($_FILES["myfile"]["name"]);
	  for($i=0; $i < $fileCount; $i++)
	  {
	  	$fileName = urlencode($_FILES["myfile"]["name"][$i]);

		//判斷副檔名是否符合
		$File_Extension = explode(".", $_FILES['myfile']['name'][$i]); 
		$File_Extension = $File_Extension[count($File_Extension)-1];
		if(!in_array($File_Extension,$limitedext)){
		echo "不支援此檔案類型";
		exit;
		}
		//判斷副檔名是否符合

		move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$output_dir.$fileName);
	  	$ret[]= $fileName;
	  }
	
	}
    echo  json_encode($ret);
 }
?>
