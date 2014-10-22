<?php
class PublishController extends Controller
{
	public  function actionIndex()
	{
		if(isset($_GET['id']))
		{
			$id=$_GET['id'];
			$sort=$_GET['sort'];
			$connection=Yii::app()->db;
			if($sort==0)
			$sql="select title,content,regtime,starttime,kind,deadline from nb_software where id=".$id.";";
			else if($sort==1)
			$sql="select title,content,regtime,starttime,kind,deadline from nb_hardware where id=".$id.";";
			$result=$connection->createCommand($sql)->query();
			while(($port=$result->read())!==false)
		{
			$title=$port['title'];
			$regtime=$port['regtime'];
			$content=$port['content'];
			$starttime=$port['starttime'];
			$kind=$port['kind'];
			$deadline=$port['deadline'];
		}
			$this->render('index',array('title'=>$title,'content'=>$content,'regtime'=>$regtime,'kind'=>$kind,
				'deadline'=>$deadline,'starttime'=>$starttime));
		}
	}
}
?>