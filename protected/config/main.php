<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Belief and Hope',
    'language' => 'az',
    'timeZone' => 'Asia/Baku',

    // preloading 'log' component
    'preload' => array('log'),

    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.extensions.*',

    ),

    'modules' => array( // uncomment the following to enable the Gii tool
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '0579',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('*', '::1'),
        ),
    ),

    // application components
    'components' => array(

        'clientScript' => array(
            'coreScriptPosition' => CClientScript::POS_END),
        //define the class and its missingTranslation event

        'request' => array(
            'baseUrl' => '/',
        ),
        'assetManager' => array(
            'basePath' => realpath(dirname(__FILE__) . '/../../temp'),
            'baseUrl' => '/temp',
        ),

        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'loginUrl' => array('login')
        ),
        // uncomment the following to enable URLs in path-format

        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'caseSensitive' => false,
            'rules' => array(
                '<language:(az|ru|en)>/' => 'site/index',
                '<language:(az|ru|en)>/<token:[\w\W]{0,}>' => 'site/<token>',
                '<language:(az|ru|en)>/<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<language:(az|ru|en)>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<language:(az|ru|en)>/<controller:\w+>/<action:\w+>/*' => '<controller>/<action>',
            ),
        ),

        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=beliefandhope',
            'emulatePrepare' => true,
            'username' => 'bh',
            'password' => 'pUaHAkLLuo',
            'charset' => 'utf8',
            'initSQLs' => array("set time_zone='+05:00';")
        ),
        'messages' => array(
            'class' => 'application.components.Messages',
        ),

        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'dashboard/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
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
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'mail@tural.us',
        'wsurl' => "http://" . $_SERVER['HTTP_HOST'],
        'languages' => array('az' => 'az', 'ru' => 'ru', 'en' => "en")
    ),
);
