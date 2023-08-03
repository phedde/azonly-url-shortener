<?php
$cfg_main = __DIR__.DIRECTORY_SEPARATOR."config.php";
$cfg_local = __DIR__.DIRECTORY_SEPARATOR."config_local.php";
$params = is_file($cfg_local) ? require $cfg_local : require $cfg_main;

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'AZON.LY',
    'language'=>$params['app.default_language'],
    'timeZone'=>$params['app.timezone'],
	'defaultController'=>'Application',

	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'behaviors'=>array(
		'runEnd'=>array(
			'class'=>'application.behaviors.WebApplicationEndBehavior'
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'loginUrl'=>array('auth/login'),
            'identityCookie'=>array(
                'httpOnly' => true,
                'path' => $params['app.base_url'],
                'secure'=> $params['cookie.secure'],
                'sameSite'=> $params['cookie.same_site'],
            ),
		),

		'urlManager'=>array(
			'urlFormat'=>'path',
            'showScriptName' => $params['url.show_script_name'],
            'cacheID'=>'cache',
            'routeVar'=>'ar',
			'rules'=>array(
				'ajax/short'=>'application/short',
				'api'=>'api/index',
				'admin'=>'application/index',
				'admin/edit/<id:\d+>'=>'application/edit',
				'admin/delete/<id:\d+>'=>'application/delete',
				'admin/login'=>'auth/login',
				'admin/logout'=>'auth/logout',
				'page/<action:[\w\_]+>'=>'page/<action>',
				'<shortid:\w+>'=>'application/redirect',
			),
		),

        'db'=>array(
            // Mysql host: localhost and databse name catalog
            'connectionString' => "mysql:host={$params['db.host']};dbname={$params['db.dbname']};port={$params['db.port']}",
            // whether to turn on prepare emulation
            'emulatePrepare' => true,
            // db username
            'username' => $params['db.username'],
            // db password
            'password' => $params['db.password'],
            // default cahrset
            'charset' => 'utf8mb4',
            // table prefix
            'tablePrefix' => 'sl_',
            // cache time to reduce SHOW CREATE TABLE * queries
            'schemaCachingDuration' => 60 * 60 * 24 * 30,
            'enableProfiling'=> YII_DEBUG,
            'enableParamLogging' => YII_DEBUG,
        ),

		'cache'=>array(
			'class'=>'CFileCache',
		),

		'errorHandler'=>array(
			'errorAction'=>'application/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
					'enabled'=>true,
				),
				/*array(
					'class'=>'CWebLogRoute',
				),*/
			),
		),
        'clientScript'=>array(
            'packages'=>array(
                'jquery'=>array(
                    'baseUrl'=>'js',
                    'js'=>array('jquery.min.js'),
                ),
            ),
        ),

        'securityManager' => array(
            'encryptionKey'=>$params['app.encryption_key'],
            'validationkey'=>$params['app.validation_key'],
        ),

        'session'=>array(
            'cookieParams'=>array(
                'httponly' => true,
                'path' => $params['app.base_url'],
                'secure'=> $params['cookie.secure'],
                'samesite'=> $params['cookie.same_site'],
            ),
        ),

        'request'=>array(
            'enableCookieValidation'=>$params['app.cookie_validation'],
            'csrfCookie' => array(
                'httpOnly' => true,
                'path' => $params['app.base_url'],
                'secure'=> $params['cookie.secure'],
                'sameSite'=> $params['cookie.same_site'],
            ),
        ),
	),
	'params'=>$params
);
