<?php
class AuthController extends BackEndController
{	
	public $layout = 'login_column';
	
	public function actionLogin()
	{
		$model = new LoginForm;

		if(isset($_POST['LoginForm']))
		{
			$model->attributes = $_POST['LoginForm'];
			if($model->validate())
			{
				$this->redirect($this->createUrl("application/index"));
			}
		}

		$this->render('login', array('model'=>$model));
	}

	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->user->returnUrl);
	}
}