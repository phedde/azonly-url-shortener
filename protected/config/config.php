<?php
return array(
    'app.timezone' => 'Europe/Berlin',
    'app.default_language' => 'en',
    'app.host' => 'http://short.codecanyon',
    'app.base_url' => '/',
    'app.encryption_key' => 'WeYbhAska2ob5QDMae2VDtJoIbW5M1lz',
    'app.validation_key' => 'LgbZen8Z5Rmg47tMJHhx2EiDCwPLm9nM',
    'app.cookie_validation' => true,
    'app.long_redirect'=>0,
    'app.dec_point'=>'.',
    'app.thousands_sep'=>',',
    'app.show_recent'=>true,
    'app.show_popular'=>true,
    'app.recent_count'=>5,
    'app.popular_count'=>5,
    'app.placeholder'=>'http://php8developer.com',

    // DB settings
    'db.host' => 'localhost',
    'db.dbname' => 'short',
    'db.username' => 'homestead',
    'db.password' => 'secret',
    'db.port' => 3306,

    // Url settings
    'url.show_script_name' => false,

    // Cookie law settings
    'cookie_law.show' => true,
    'cookie_law.link' => 'https://www.google.com/intl/{language}/policies/privacy/partners/',
    'cookie_law.theme' => 'light-floating',
    'cookie_law.expiry_days' => 365,

    // Cookie settings
    'cookie.secure'=>false,
    'cookie.same_site'=>'Lax',

    // Google settings
    'google.server_key'=>'',
    'google.validation'=>false,

    /**
     * Restrict "foo.bar" domain name: '^(?:(https?):\/\/)?(?:www\.)?foo\.bar'
     * Restrict "foo.bar" domain including all its subdomains: '^(?:(https?):\/\/)?(?:(([\pL\-])+\.)+?)?foo\.bar'
     * Restrict a link that has an "xxx" word: 'xxx'
     * Restrict mailto links: '^mailto:'
     * Optimized restriction rule of two domain names including all their subdomains:
     *      '^(?:(https?):\/\/)?(?:(([\pL\-])+\.)*)?(foo\.bar|zap\.zip)'
     */
    'app.restricted_patterns'=>array(
    ),

    // Api settings
    'api.daily_limit'=>1000, // Set 0 to allow unlimited number of daily requests.
    'api.enabled'=>true,

    // Admin settings
    'admin.login'=>'admin',
    'admin.password'=>'admin',
    'admin.name'=>'Administrator',

    // Template settings
    'template.banner_top' => '',
    'template.banner_bottom' => '',
    'template.head' => '',
    'template.footer' => '<p>Developed by <strong><a href="http://php8developer.com">PHP8 Developer</a></strong></p>',
);