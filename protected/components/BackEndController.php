<?php
Class BackEndController extends CController
{
	public $menu = array();
	public $layout = 'auth_column';
	public $breadcrumbs = array();

	public function init()
	{
		Yii::import('application.models.Admin');
		parent::init();
	}

	public function filters()
	{
		return array('accessControl');
	}

	public function accessRules()
	{
		return array(
			array('allow',
				'users'=>array('@'),
			),
			array('allow',
				'controllers'=>array('auth'),
				'actions'=>array('login'),
				'users'=>array('?'),
			),
			array('deny',
				'users'=>array('*'),
			),
		);
	}
}
