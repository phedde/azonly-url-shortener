<?php
class ClearstatCommand extends CConsoleCommand {
	public function actionIndex() {
		$date = date("Y-m-d", time() - 60 * 60 * 24 * 1);
		Yii::app()->db->createCommand() -> delete('{{request_count}}', "`day` < :date", array(
			":date" => $date,
		));
	}
}