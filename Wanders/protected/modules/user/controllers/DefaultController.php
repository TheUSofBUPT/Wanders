<?php

/*
	用userForm写的通用版
*/

class DefaultController extends Controller
{

	//$layout = 'application.modules.login.views.layouts.main';
	
	//产生验证码
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
	
	//主页
	public function actionIndex(){
		$this->render('index');
	}

	//wiker注册
	public function actionWiker(){
	
    	$model = new userForm('wikerRegister');
        if(isset($_POST['userForm']))
		{
			$model->attributes=$_POST['userForm'];
			Yii::app()->session['email']=$model['email'];
			if($model->validate())
			{
				if($model->emailAuthenticate())
				{
					if($model->wikerRegister())
			   		{
						$model->login();
						echo "注册成功，正在跳转到主页......";
						$this->redirect(Yii::app()->homeUrl);
                	}
				}
			}
			
		}
    	$this->render('wiker',array('model'=>$model));
    }
	
	//hirer注册
	public function actionHirer(){
	 
    	$model = new userForm('hirerRegister');
        if(isset($_POST['userForm']))
		{
			$model->attributes=$_POST['userForm'];
			Yii::app()->session['email']=$model['email'];
			if($model->validate())
			{
				if($model->emailAuthenticate())
				{
					if($model->hirerRegister())
					{
						$model->login();
						echo "注册成功，正在跳转到主页......";
						$this->redirect(Yii::app()->homeUrl);
               		}
				}
			}
			
		
		}
    	$this->render('hirer',array('model'=>$model));
    }


	//用userForm的登陆页面
	public function actionLogin()
	{
		$this->layout = "application.modules.login.views.layouts.main";
		$loginModel = new userForm('login');								//果然，在更换了场景之后就不同了
		
		if(isset($_POST['userForm']))
		{
			$loginModel -> attributes = $_POST['userForm'];
			if($loginModel -> validate() && $loginModel->login())
			{
				$userKind=$loginModel -> userKindChoose();
				Yii::app()->session['username']=$loginModel['username'];
				Yii::app()->session['userkind']=$userKind;
				$this->redirect(Yii::app()->homeUrl);
			}
			
		}
		
		$this -> render("login",array('loginModel' => $loginModel));
	}
	public function actionlogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	//出错了
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

    
}