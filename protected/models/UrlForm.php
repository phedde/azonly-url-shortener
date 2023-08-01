<?php

class UrlForm extends CFormModel
{
    public $url;

    public function rules()
    {
        return array(
            array('url', 'required'),
            array('url', 'application.components.UrlValidator'),
            array('url', 'same_host'),
            array('url', 'restricted_patterns'),
            array('url', 'remote_validator'),
            array('url', 'post_filter'),
        );
    }

    public function same_host($attribute) {
        if(Helper::sameHost($this->url)) {
            $this->addError($attribute, 'Same host URL is not allowed.');
        }
    }

    public function restricted_patterns($attribute) {
        $patterns = (array) Yii::app()->params['app.restricted_patterns'];
        if(empty($patterns)) {
            return;
        }
        foreach ($patterns as $pattern) {
            if(empty($pattern)) {
                continue;
            }

            if(preg_match("~$pattern~i", $this->url)) {
                $this->addError($attribute, "URL is blocked.");
                return;
            }
        }
    }

    public function remote_validator($attribute) {
        $is_enabled = (bool) Yii::app()->params['google.validation'];
        if (false === $is_enabled) {
            return;
        }
        $is_valid_url = filter_var($this->url, FILTER_VALIDATE_URL);
        if(false === $is_valid_url) {
            return;
        }

        $status = Diagnostic::google($this->url);
        if (strcmp($status, "caution") === 0) {
            $this->addError($attribute, "URL is not safe.");
        }
    }

    public function post_filter() {
        if(!$this->hasErrors('url')) {
            $scheme = parse_url($this->url, PHP_URL_SCHEME);
            if(empty($scheme)) {
                $this->url = 'http://'.$this->url;
            }
        }
    }
}