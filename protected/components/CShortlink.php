<?php
class CShortlink
{
	private static $_characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

    public static function shortByID($id)
    {
        $length = self::getLength();
        $digits = array();
        $string = '';
        while($id > 0)
        {
            $modulo = fmod($id, $length);
            array_push($digits, $modulo);
            $id = floor($id / $length);
        }
        $digits = array_reverse($digits);
        foreach($digits as $digit)
        {
            $string .= self::$_characters[(int)$digit];
        }
        return $string;
    }

    public static function getID($short)
    {
        $length = self::getLength();
        $id = 0;
        $len = strlen((string)$short);
        $power = $len - 1;
        for($i = 0; $i < $len; $i++)
        {
            $pos = strpos(self::$_characters, $short[$i]);
            $id += $pos * pow($length, $power);
            $power--;
        }
        return $id;
    }

    private static function getLength()
    {
        return strlen(self::$_characters);
    }
}