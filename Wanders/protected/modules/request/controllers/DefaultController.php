<?php

class DefaultController extends Controller
{
	public $layout='application.modules.request.views.layouts.main';
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
				
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName			
		);
	}
	public function actionIndex()
	{
		$model=new RequestForm;
		if(isset($_POST['RequestForm']))
		{
			$model->attributes=$_POST['RequestForm'];
			if($model->validate())
			{
				$connection=Yii::app()->db;
				$sql="insert into nb_software(title,kind,starttime,deadline,body) values('".$model->title."','".$model->kind."','".$model->starttime."','".$model->deadline."','".$model->body."')";
                $command=$connection->createCommand($sql);
				$rowCount=$command->execute();
				if($rowCount>0)
				{
					Yii::app()->createUrl('search');
				}
			}
		}
		$this->render('index',array('model'=>$model));
	}
}