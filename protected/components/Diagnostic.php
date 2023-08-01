<?php

/*
diagnose = array (
	'caution', 'warning', 'untested', 'safe'
);
*/
class Diagnostic
{
    private static $glUrl = 'https://safebrowsing.googleapis.com/v4/threatMatches:find?key=%s';
    private static $norUrl = 'https://safeweb.norton.com/report/show?url=%s';

    public static function google($url)
    {
        $api_url = sprintf(self::$glUrl, Yii::app()->params['google.server_key']);

        $data = json_encode(array(
            "client"=>array(
                "clientId"=>"PHP8 Developer. Codecanyon user",
                "clientVersion"=>"0.0.1",
            ),
            "threatInfo"=>array(
                "threatTypes"=>array("MALWARE", "SOCIAL_ENGINEERING", "UNWANTED_SOFTWARE", "POTENTIALLY_HARMFUL_APPLICATION"),
                "platformTypes"=>array("ALL_PLATFORMS"),
                "threatEntryTypes"=>array("URL"),
                "threatEntries"=>array(
                    array("url"=>$url)
                ),
            ),
        ));

        $curl = curl_init($api_url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type: application/json", 'Content-Length: ' . strlen($data)));
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        if(!$raw = Helper::curl_exec($curl)) {
            return 'untested';
        }

        $response = (array) @json_decode($raw, true);
        return isset($response['matches'][0]['threatType']) ? "caution" : "safe";
    }

    public static function norton($url) {
        $api_url = sprintf(self::$norUrl, $url);
        $diagnose = array(
            'icoSafe' => 'safe',
            'icoUntested' => 'untested',
            'icoWarning' => 'caution',
            'icoCaution' => 'warning',
            'icoNSecured' => 'safe',
        );
        if(!$response = Helper::curl($api_url)) {
            return 'untested';
        }
        preg_match('#<img(?:[^>]*)class="big_clip (.*?)"(?:[^>]*)>#is', $response, $matches);
        $d = isset($matches[1]) ? trim($matches[1]) : 'untested';
        return isset($diagnose[$d]) ? $diagnose[$d] : 'untested';
    }
}
