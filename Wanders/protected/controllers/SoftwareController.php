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
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$connection=mysql_connect('localhost','root','624386547');
		mysql_select_db('yii',$connection);
		$sql="select title from nb_software;";
		$result=mysql_query($sql);
		//echo $result;
		//echo $result;
		while($port=mysql_fetch_array($result))
		{
			$name[]=$port['title'];
		}
		$this->render('index',array('name'=>$name));
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