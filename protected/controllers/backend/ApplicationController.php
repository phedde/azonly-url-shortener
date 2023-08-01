<?php
class ApplicationController extends BackEndController
{

	public function actionIndex()
	{
		$model = new Shortlink('search');
		$model->unsetAttributes();
		if(isset($_GET['ShortLink'])) {
			$model->attributes = $_GET['ShortLink'];
		}
		$this->render('index', array(
			'model'=>$model,
		));
	}

	public function actionEdit($id)
	{
		if(!$model = Shortlink::model()->findByPk($id)) {
			throw new CHttpException(404, 'The specified post cannot be found.');
		}

		$model->setScenario("update");
		if(isset($_POST['ShortLink']))
		{
			$model->attributes = $_POST['ShortLink'];
			if($model->save())
			{
				Yii::app()->user->setFlash("success", "The record {$id} was successfully updated");
				Yii::app()->request->redirect($this->createUrl("/admin"));
			}
			else
				Yii::app()->user->setFlash("error", "A Database error has occurred");
		}

		$this->render('edit', array(
			'model'=>$model,
		));
	}

	public function actionDelete($id)
	{
		Shortlink::model()->deleteByPk($id);
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

    public function actionError()
    {
        if(!$error=Yii::app()->errorHandler->error) {
            return true;
        }
        if(Yii::app()->request->isAjaxRequest) {
            echo $error['message'];
            exit(0);
        }

        $this->render('error', array(
            'title'=>$error['code'],
            'description'=>$error['code'],
        ));
    }
}
