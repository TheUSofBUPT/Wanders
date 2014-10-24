<?php
class SoftwareController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			
			'iosapp'=>array(
				'class'=>'CViewAction',
			),
			'androidapp'=>array(
				'class'=>'CViewAction',
			),
			'webbuild'=>array(
				'class'=>'CViewAction',
			),
			'computerapp'=>array(
				'class'=>'CViewAction',
			),
		);
	}
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		if(isset($_POST['RequestForm']))
		{
			$model=new RequestForm;
			$model->attributes=$_POST['RequestForm'];
			if($model->validate())
			{
					$sql="insert into nb_software(title,kind,starttime,deadline,content) values('".$model->title."','".$model->kind."','".$model->starttime."','".$model->deadline."','".$model->content."')";
                	$command=Yii::app()->db->createCommand($sql);
					$rowCount=$command->execute();
					if($rowCount>0)
					{
						Yii::app()->createUrl('search');
					}
			}
		}
		$sql="select title,id,regtime from nb_software;";
		$result=Yii::app()->db->createCommand($sql)->query();
		//echo $result;
		//echo $result;
		while($port=$result->read())
		{
			$name[]=$port['title'];
			$id[]=$port['id'];
			$time[]=$port['regtime'];
		}
		if(!isset($name))
		$this->render('index');
		else
		$this->render('index',array('name'=>$name,'id'=>$id,'time'=>$time));
	}
    public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
	public function actionIosapp()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('iosapp/index');
	}
	public function actionAndroidapp()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('androidapp/index');
	}
	public function actionWebbuild()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('webbuild/index');
	}
	public function actionComputerapp()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('computerapp/index');
	}
}
?>