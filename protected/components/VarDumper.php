<?php
class VarDumper extends CVarDumper {
	public static function dump($var,$depth=10,$highlight=true){
		echo '<pre>';
		echo self::dumpAsString($var,$depth,$highlight);
		echo '</pre>';
	}
}