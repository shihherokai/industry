	<?php 
	/**
	* 取得登入使用者所有資料
	*/

    function get_user_information($user)
	{
		//定義一個 $datas 陣列變數，準備要放查詢的資料
		$data = null;
		
		//將查詢語法當成字串，記錄在$sql變數中
		$sql = "SELECT * FROM `industry_upload` WHERE `tel` = '{$user}';";
		
		//用 mysql_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
		$result = mysql_query($sql);
		
		//如果請求成功
		if($result)
		{
			//使用 mysql_num_rows 方法，判別執行的語法，其取得的資料量，是否大於0
			if(mysql_num_rows($result) == 1 || mysql_num_rows($result) > 1)
			{
				$data = mysql_fetch_assoc($result);
				
				
			}
			
			//釋放資料庫查詢到的記憶體
			mysql_free_result($result);
		}
		else
		{
			echo  "{$sql} 語法執行失敗，錯誤訊息：" . mysql_error();
		}
		
		
		//回傳結果
		return $data;
	}


	/**
	 * 登入的方法
	 */
	function login($user = null)
	{
		//定義一個 $has_user 布林變數，準備要放查詢的資料
		$has_user = FALSE;
		
		//將查詢語法當成字串，記錄在$sql變數中
		$sql = "SELECT * FROM `industry_upload` WHERE `tel` = '{$user}';";
		
		//用 mysql_query 方法取執行請求（也就是sql語法），請求後的結果存在 $query 變數中
		$result = mysql_query($sql);
		//如果請求成功
		if($result)
		{
			//使用 mysql_num_rows 方法，判別執行的語法，其取得的資料量，是否大於0
			if(mysql_num_rows($result) == 1 || mysql_num_rows($result) > 1)
			{
				$has_user = true;
				
			}
			
			//釋放資料庫查詢到的記憶體
			mysql_free_result($result);
		}
		else
		{
			echo  "{$sql} 語法執行失敗，錯誤訊息：" . mysql_error();
		}
		
		
		//回傳結果

		return $has_user;
	}
	
?>