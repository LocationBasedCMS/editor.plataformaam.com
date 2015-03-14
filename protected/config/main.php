<?php

Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');

Yii::setPathOfAlias('b3uConfig','/opt/editor.plataformaam.com/');


// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Aprendizagem em Movimento : Módulo Editor ',
        'sourceLanguage'=>'pt-br',
        'language'=>'pt-br',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'ext.giix-components.*', // giix components            
	),
        'theme'=>'bootstrap',
    
	'modules'=>array(
		// uncomment the following to enable the Gii tool
                //TODO : Eliminar o gii
                /*
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
                        // giix generators
                        'generatorPaths' => array(
                                'ext.giix-core', 'bootstrap.gii',
                        ),
                    
			'password'=>'ogiiresolveporra',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('192.168.1.*','::1'),
		),
                 */
                 
	),

	// application components
	'components'=>array(
            
                'bootstrap'=>array(  'class'=>'bootstrap.components.Bootstrap',  ),
            
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
                        //'class' => 'UserIdentity',
		),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
                /*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
                 */
		// uncomment the following to use a MySQL database
		'db'=>require  Yii::app()->basePath.'/opt/editor.plataformaam.com/config.php' ,
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
