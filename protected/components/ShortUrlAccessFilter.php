<?php
class ShortUrlAccessFilter extends CFilter {
	protected $protection = array(
		array("api", "index"),
		array("application", "short"),
	);
	
    protected function preFilter($filterChain) {
		$limit = Yii::app()->params['api.daily_limit'];
		if($limit === 0) {
			return true;
		}
		
		$controllerID = strtolower($filterChain->controller->id);
		$actionID = strtolower($filterChain->controller->action->id);
		$ip = Yii::app()->request->userHostAddress;
		foreach($this->protection as $protection) {
			if($protection[0] == $controllerID AND $protection[1] == $actionID) {
				$cnt = Yii::app()->db->createCommand()
					-> select('total')
					-> from ('{{request_count}}')
					-> where ('day=:day AND ip=:ip', array(
						':day' => date("Y-m-d"),
						':ip' => $ip,
					))
					-> queryScalar();
				if($cnt > $limit) {
					throw new CHttpException(403, "You have been reached daily limit ($limit req. per day)");
				}
				break;
			}
		}
		return true;
    }
}