<?php

class DefaultController extends Controller
{
	public $layout='application.modules.request.views.layouts.main';
	public function filters()
	{
		if(!isset(Yii::app()->session['username']))
		{
             $this->redirect(Yii::app()->createUrl('user/default/login'));
		}
	}
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
		$sort=$_GET['sort'];
		$this->render('index',array('model'=>$model,'sort'=>$sort));
	}
}