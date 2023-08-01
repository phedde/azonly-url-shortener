<?php
class ApiController extends FrontEndController
{
	public function init()
	{
	    if(!Yii::app()->params['api.enabled']) {
            throw new CHttpException(404);
        }
	}
	
	public function actionIndex()
	{
        $form = new UrlForm();
        $form->attributes = array(
            'url'=>Yii::app()->getRequest()->getQuery('url')
        );

        if(!$form->validate()) {
            $this->response(array(
                "error"=>'Invalid URL',
            ));
        }
        $url = $form->url;

        try {
            $model = Shortlink::insertNewLink($url);
        } catch (Throwable $t) {
            $this->response(array('error'=>'Error while inserting data'));
        } catch(Exception $e) {
            $this->response(array('error'=>'Error while inserting data'));
        }

        $this->response(array(
            'long'=>$url,
            'short'=>$this->createAbsoluteUrl("application/redirect", array(
                "shortid"=>$model['UrlShort']
            ))
        ));
	}
	
	private function response(array $response)
	{
        header('Content-type: application/json');
        echo json_encode($response);
        Yii::app()->end();
	}
}