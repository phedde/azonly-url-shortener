<?php

class UserIdentity extends CUserIdentity
{
	private $_id;

	const ERROR_L_OR_P_INVALID = 3;

	public function authenticate()
	{
	    $admin = null;

        $credentials = array(
            "username"=>Yii::app()->params['admin.login'],
            "password"=>Yii::app()->params['admin.password'],
        );
        if($this->username === $credentials["username"] && $this->password === $credentials['password']) {
            $admin = $credentials;
            $admin['name'] = Yii::app()->params['admin.name'];
        }

		if($admin == null)
		{
			$this->errorCode = self::ERROR_L_OR_P_INVALID;
		}
		else
		{
			$this->_id = $admin['username'];
			$this->setState('name', $admin['name']);
			$this->errorCode = self::ERROR_NONE;
		}

		return !$this->errorCode;
	}

	public function getId()
	{
		return $this->_id;
	}
}