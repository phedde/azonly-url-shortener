<?php

class LoginForm extends CFormModel
{
	public $login;
	public $password;

	private $_identity;

	public function rules()
	{
		return array(
			array('login, password', 'required'),
			array('password', 'authenticate'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'login'=>'Login',
			'password'=>'Password',
		);
	}

	public function authenticate()
	{
		if(!$this->hasErrors())
		{
			$this->_identity = new UserIdentity($this->login, $this->password);
			if(!$this->_identity->authenticate())
			{
				$this->addError("login", "Incorrect name or surname");
				$this->addError("password", null);
			}
			else
			{
				Yii::app()->user->login($this->_identity, 3600);
				return true;
			}
			return false;
		}
	}
}