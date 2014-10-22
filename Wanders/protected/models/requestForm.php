<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class RequestForm extends CFormModel
{
	public $title;
	public $kind;
	public $starttime;
	public $deadline;
	public $content;
	public $verifyCode;
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// title kind deadline and body are required
			array('title, kind, starttime, deadline, content', 'required'),
			// verifyCode needs to be entered correctly
			array('title','authenticate'),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'title' => '项目名',
			'kind' => '类型',
			'starttime'=>'开始日期',
			'deadline' => '项目完成期限',
			'content' => '内容',
			'verifyCode'=>'验证码',
		);
	}
	public function authenticate($attribute,$params)
	{
		if(empty($this->title))
			$this->addError('title','no empty');
	}
}