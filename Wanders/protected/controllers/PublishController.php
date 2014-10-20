<?php
class PublishController extends Controller
{
	public  function actionIndex()
	{
		if(isset($_GET['id']))
		{
			$id=$_GET['id'];
			$connection=Yii::app()->db;
			$sql="select title,body from nb_software where id=".$id.";";
			$result=$connection->createCommand($sql)->query();
			//echo $result;
			//echo $result;
			while($port=mysql_fetch_array($result))
		{
			$name[]=$port['title'];
			$content[]=$port['body'];
		}
			$this->render('index',array('name'=>$name,'content'=>$content));
		}
	}
}
?>