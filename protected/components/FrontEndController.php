<?php
class FrontEndController extends CController
{
	public $layout = 'column';
	public $breadcrumbs = array();
	public $menu = array();
	public $title;
	
	public function filters() {
		return array(
			array('application.components.ShortUrlAccessFilter'),
		);
	}
	
	public function init()
	{
        parent::init();
        $this->registerCookieDisclaimer();
	}

    protected function registerCookieDisclaimer() {
        if(Yii::app()->request->isAjaxRequest OR !Yii::app()->params['cookie_law.show']) {
            return true;
        }

        /**
         * @var $cs CClientScript
         */
        $cs = Yii::app()->clientScript;
        $cs->registerScriptFile(Yii::app()->baseUrl."/js/cookieconsent.latest.min.js", CClientScript::POS_END);
        $path = Yii::app()->params['app.base_url'].";SameSite=".Yii::app()->params['cookie.same_site'];
        if(Yii::app()->params['cookie.secure']) {
            $path .= ";secure";
        }
        $cs->registerScript("cookieconsent", "
			window.cookieconsent_options = {
				learnMore: ".CJavaScript::encode(Yii::t("app", "cookie_law_more")).",
				dismiss: ". CJavaScript::encode(Yii::t("app", "cookie_law_ok")).",
				message: ". CJavaScript::encode(Yii::t("app", "cookie_law_message")).",
				theme:". CJavaScript::encode(Yii::app()->params['cookie_law.theme']).",
				link: ". CJavaScript::encode(strtr(Yii::app()->params['cookie_law.link'], array('{language}'=>Yii::app()->language))).",
				path: ". CJavaScript::encode($path).",
				expiryDays: ". CJavaScript::encode(Yii::app()->params['cookie_law.expiry_days'])."
			};
		", CClientScript::POS_HEAD);
        $cs->registerCss("hide_cookie_law_logo", "
            .cc_logo { display: none !important; }
        ");
        return true;
    }
}