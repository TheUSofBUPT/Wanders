<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP探针-UPUPW环境集成包APACHE专用版</title>
</head>
<body>
<?php

	function makecomment($commentdata)
	{
		if(is_array($commentdata))
		{
			foreach( $commentdata as $comment )			//遍历输出所有的评论遍历
			{
				$con=Yii::app()->db;
				$res;
				
				if( $comment['userkind'] == 1 )			//如果用户是服务方
				{
					$sqlcmd = "select username from nb_sellers where id=".$comment['uid'].";";
					$res = $con->createCommand($sqlcmd)->queryAll();
					//echo $sqlcmd;
				}
				else
				{
					$sqlcmd = "select username from nb_buyers where id=".$comment['uid'].";";
					$res = $con->createCommand($sqlcmd)->queryAll();
				}
				//print_r($res);
				$imgstr = md5("uid=".$comment['uid']."userkind=".$comment['userkind']);
				
				echo "<img src = \"".Yii::app()->baseUrl."/images/userimages/".$imgstr.".jpg\"</img>";
				echo "用户\t".$res[0]['username']."\t评论说\t".$comment['comment']."<br>";
			}
		}
	}
	echo "主页面<br><br>";

	$pid = 1;
	$parentid = 2;

	$connection=Yii::app()->db;
	$sql="select comment,uid,userkind from nb_comment where pid=".$pid." and parentid =".$parentid.";";
	$result=$connection->createCommand($sql)->queryAll();

	makecomment($result);
	
	echo "<br><br>";
	
	for($i = 1 ;$i <= 4 ;$i++ )
	{
		$str = "uid=".$i."userkind=1";
		echo md5($str)."<br>";
	}
	//print_r($result);

?>
</body>

</html>