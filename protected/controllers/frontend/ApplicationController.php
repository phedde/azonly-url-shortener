<?php
class ApplicationController extends FrontEndController
{
	public function filters()
	{
		return array_merge(parent::filters(), array(
			'ajaxOnly + short',
			'postOnly + short',
		));
	}

	public function actionIndex()
	{
        $this->title = Yii::t("app", "site_title");
        $cs=Yii::app()->clientScript;
        $cs->registerMetaTag(Yii::t("app", "site_keywords"), 'keywords');
        $cs->registerMetaTag(Yii::t("app", "site_description"), 'description');
        $cs->registerMetaTag(Yii::t("app", "site_og_title"),null,null,array('property'=>'og:title'));
        $cs->registerMetaTag(Yii::t("app", "site_og_description"),null,null,array('property'=>'og:description'));
        $cs->registerMetaTag(Yii::t("app", "site_og_logo"),null,null,array('property'=>'og:image', 'encode'=>false));

        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/clipboard.min.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/share42.js', CClientScript::POS_END);
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/frontend.js?v=0.2', CClientScript::POS_END);

		$recent = Shortlink::getRecent(Yii::app()->params['app.recent_count']);
		$top = Shortlink::getTop(Yii::app()->params['app.popular_count']);
		$totalUrl = Shortlink::model()->cache(1000)->count();
		$totalHits =  Shortlink::model()->cache(1000)->totalHits();
		$today = Shortlink::model()->cache(1000)->getToday();

		$this->render('index', array(
			'top'=>$top,
			'recent'=>$recent,
			'totalUrls'=>$totalUrl,
			'totalHits'=>$totalHits,
			'today'=>$today,
		));
	}

	public function actionShort()
	{
        $form = new UrlForm();
        $form->attributes = array(
            'url'=>Yii::app()->request->getPost('url')
        );
        if(!$form->validate()) {
            $this->_response(array('error'=>true));
        }
        $url = $form->url;
        try {
            $model = Shortlink::insertNewLink($url);
        } catch (Throwable $t) {
            $this->_response(array('error'=>true));
        } catch(Exception $e) {
            $this->_response(array('error'=>true));
        }
		
		$this->_response(array(
			'url'=>$url,
			'shortlink'=>$this->createAbsoluteUrl("application/redirect", array(
                "shortid"=>$model['UrlShort']
            ))
		));
	}

	public function actionRedirect($shortid = null)
	{
		$seconds = Yii::app()->params['app.long_redirect'];

		if(!$url = Shortlink::getByShort($shortid)) {
			throw new CHttpException(404);
		}
		$url->saveCounters(array('Hits'=>1));

		$lang_params = array(
            "{short}"=>$url['UrlShort'],
            "{url}"=>$url['Url'],
            "{hits}"=>$url['Hits'],
        );

        $this->title = Yii::t("app", "redirect_title", $lang_params);
        $cs=Yii::app()->clientScript;
        $cs->registerMetaTag(Yii::t("app", "redirect_description", $lang_params), 'description');
        $cs->registerMetaTag(Yii::t("app", "redirect_og_title", $lang_params),null,null,array('property'=>'og:title'));
        $cs->registerMetaTag(Yii::t("app", "redirect_og_description", $lang_params),null,null,array('property'=>'og:description'));
        $cs->registerMetaTag(Yii::t("app", "redirect_og_logo"),null,null,array('property'=>'og:image', 'encode'=>false));

		if((int) $seconds > 0)
		{
			$this->render('redirect', array(
				'seconds'=>$seconds,
				'model'=>$url,
			));
		}
		else
		{
            $this->redirect($url['Url']);
		}
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
			'title'=>$error['code'] == 404 ? Yii::t("app", "404_title") : $error['code'],
			'description'=>$error['code'] == 404 ? Yii::t("app", "404_description") : $error['message'],
		));
	}

	private function _response($response)
	{
		header('Content-type: application/json');
		echo json_encode($response);
		Yii::app()->end();
	}
}