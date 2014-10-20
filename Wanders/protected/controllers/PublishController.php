<?php
class PublishController extends Controller
{
	public  function actionIndex()
	{
		if(isset($_GET['id']))
		{
			$id=$_GET['id'];
			$connection=mysql_connect('localhost','root','624386547');
			mysql_select_db('yii',$connection);
			$sql="select title,body from nb_software where id=".$id.";";
			$result=mysql_query($sql);
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