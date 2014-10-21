<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	 
	public $userkind;  //用户的类型 
	 
	public function authenticate()	//根据需要进行修改的，以后用习惯了之后可以进行高阶的修改
	{
		$userinfo;
		
		$con = Yii::app()->db;
		
		$sqlcmd = "select * from nb_buyers where username = '".$this->username."'";
		
		$res = $con -> createCommand($sqlcmd)-> queryAll();
		
		if($res)
		{
			$this->userkind = 0;
			$userinfo = $res[0];
		}
		else
		{
					
			$sqlcmd = "select * from nb_sellers where username = '".$$this->username."'";
		
			$res = $con -> createCommand($sqlcmd)-> queryAll();
			
			if($res)
			{
				$this->userkind = 1;
				$userinfo = $res[0];
			}
			
		}

		//两者都不存在
		if($userinfo == NULL)
		{
			$this->errorCode=self::ERROR_USERNAME_INVALID;
			return false;
		}
		//密码不正确
		if($userinfo['password'] !== md5($this->password))
		{

			$this->errorCode=self::ERROR_PASSWORD_INVALID;
			return false;
		}
		//没有错误，可以登录

		$this->errorCode=self::ERROR_NONE;
		return true;
		
		/*
		$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
		*/
	}
}