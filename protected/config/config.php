<?php
return array(
    'app.timezone' => 'Europe/Berlin',
    'app.default_language' => 'en',
    'app.host' => getenv('HOST_URL'),
    'app.base_url' => '/',
    'app.encryption_key' => getenv('ENCRYPTION_KEY'),
    'app.validation_key' => getenv('VALIDATION_KEY'),
    'app.cookie_validation' => true,
    'app.long_redirect'=>0,
    'app.dec_point'=>'.',
    'app.thousands_sep'=>',',
    'app.show_recent'=>true,
    'app.show_popular'=>true,
    'app.recent_count'=>5,
    'app.popular_count'=>5,
    'app.placeholder'=>'https://azon.ly',

    // DB settings
    'db.host' => getenv('DATABASE_HOST'),
    'db.dbname' => getenv('DATABASE_NAME'),
    'db.username' => getenv('DATABASE_USERNAME'),
    'db.password' => getenv('DATABASE_PASSWORD'),
    'db.port' => getenv('DATABASE_PORT'),

    // Url settings
    'url.show_script_name' => false,

    // Cookie law settings
    'cookie_law.show' => false,
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
    'api.enabled'=>false,

    // Admin settings
    'admin.login'=> getenv('ADMIN_USER'),
    'admin.password'=> getenv('ADMIN_PASS'),
    'admin.name'=>'Admin',

    // Template settings
    'template.banner_top' => '',
    'template.banner_bottom' => '',
    'template.head' => '',
    'template.footer' => '<p>By <strong>azon.ly</strong></p>',
);
