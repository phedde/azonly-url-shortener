<?php
class UrlValidator extends CUrlValidator {
    public $pattern = "/^(?:([a-z\pL]+):(?:([a-z\pL]*):)?\/\/)?(?:([^:@]*)(?::([^:@]*))?@)?((?:[a-z\pL0-9_-]+\.)+[a-z\pL]{2,}|localhost|(?:(?:[01]?\d\d?|2[0-4]\d|25[0-5])\.){3}(?:(?:[01]?\d\d?|2[0-4]\d|25[0-5])))(?::(\d+))?(?:([^\?]+))?(?:(.+))?$/iu";
} 