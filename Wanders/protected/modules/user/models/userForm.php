<?php

//晚上回来看看能不能用函数实现那个啥注册功能
/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class userForm extends CFormModel
{
	

	//系统自带信息
	public $rememberMe;
	public $verifyCode;
	public $id;

	
	//用户个人信息
	public $username;
	public $password;
	public $password2;
	
	
	public $realname;
	public $gender;
	public $number;
	public $school;
	public $address;
	public $email;
	public $regtime;
	
	
	public $level;
	public $credit;
	public $ability;
	public $status;
	

	public $_identity;
	
	//交易有关属性
	public $tradenum;

	 
	 /*
		添加三个场景，就是登陆，hirer注册与worker注册
		
		Label已经分类
		然后写rules
		最后将相应的函数添加上去
			比如adderrors
		validator是检验输入的合适与否的
		但是identity是检验数据是否有误的
			
	 */
	 
	 
	public function rules()
	{
		return array(

			//登陆的时候用的规则
			array('username', 'required','message'=>'用户名不能为空','on'=>'login'),
			array('password', 'required','message'=>'密码不能为空','on'=>'login'),
			array('rememberMe', 'boolean','on'=>'login'),
			array('password', 'authenticate','on'=>'login'),
				
			array('username, password, password2, school, email, number, realname, verifyCode', 'required','message'=>'信息未填写完全','on'=>'wikerRegister'),
			array('username, password, password2, email, address, verifyCode','required','message'=>'信息未填写完全','on'=>'hirerRegister'),
			
			
			array('email', 'email','message'=>'邮箱格式不正确','on'=>'hirerRegister,wikerRegister'),
			array('password2', 'compare', 'compareAttribute'=>'password','message'=>'两次密码不一致','on'=>'hirerRegister,wikerRegister'),
			array('username, password, email, address, school, number, realname, gender', 'length', 'max'=>40,'message'=>'信息长度不能超过40','on'=>'hirerRegister,wikerRegister'),
			array('regtime', 'safe','on'=>'hirerRegister,wikerRegister'),
			
			

		);
	}


	public function attributeLabels()
	{
		return array(
		
			//系统自带
			'rememberMe'=>'记住我',
			'verifyCode'=>'验证码',
			'id' => 'ID',
			
			//用户个人信息
			'username'=>'用户名',
			'password'=>'密码',
			'password2'=>'确认密码',
			

			'realname'=>'真实姓名',
			'gender' => '性别',
			'number'=>'学号',
			'school'=>'所在学校',
			'address' => '地址',
			'email'=>'电子邮箱',
			'regtime' => '注册时间',
			
			
			'level' => '等级',
			'credit' => '信用',
			'ability' => '能力',
			'status' => '状态',
			
			//交易有关属性
			'tradenum' => '交易编号',


		);
	}

	//自己可以改的验证函数
	public function authenticate($attribute,$params)	
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			if(!$this->_identity->authenticate())
				$this->addError('password','用户名或密码错误');
		}
	}


	
	public function hirerRegister()
	{
		//先检测用户名是否存在，什么一个用户只能注册一个的再说
		$connection = Yii::app()->db;
		
		$sql_command = "select * from nb_buyers where username = '".$this->username."'";
		
		$command = $connection -> createCommand($sql_command);
		
		$result = $command -> queryAll();
		
		if($result)
		{
			$this->addError('username','该用户名已经被注册');
			return false;
		}
		
		$sql_command = "insert into nb_buyers (`username`,`password`,`email`,`gender`,`address`) values ( '".$this->username."','".md5($this->password)."','".$this->email."',".($this->gender == '女'? 0 : 1).",'".$this->address."')";
		
		$command = $connection -> createCommand($sql_command);
		
		if($command->execute())
		{
			return true;
		}
		else
		{
			$this->addError('sql','数据库错误');
			return false;
		}
	}
	
	public function wikerRegister()
	{
		//先检测用户名是否存在，什么一个用户只能注册一个的再说
		$connection = Yii::app()->db;
		
		$sql_command = "select * from nb_sellers where username = '".$this->username."'";
		
		$command = $connection -> createCommand($sql_command);
		
		$result = $command -> queryAll();
		
		if($result)
		{
			$this->addError('username','该用户名已经被注册');
			return false;
		}
		
		$sql_command = "insert into nb_sellers (`username`,`password`,`email`,`gender`,`school`,`number`,`realname`) values ( '".$this->username."','".md5($this->password)."','".$this->email."','".($this->gender == '女'? 0 : 1)."','".$this->school."','".$this->number."','".$this->realname."')";
		
		$command = $connection -> createCommand($sql_command);
		
		if($command->execute())
		{
			return true;
		}
		else
		{
			$this->addError('sql','数据库错误');
			return false;
		}
	}
	
 
	//基于userIdentity的login，等下看一下是否一定要给予这个东西
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)	//貌似是没有错误的意思 
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
	

}
