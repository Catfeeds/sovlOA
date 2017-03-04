<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
require_once(dirname(__FILE__).'/define.php');//加载定义的全局变量

return array(
        'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
        'name'=>'一休网',
        'language'=>'zh_cn',
		'preload'=>array('log'),
        // autoloading model and component classes
        'import'=>array(
                'application.models.*',
                'application.components.*',
                'application.common.*',
				'application.vendors.*',  
        ),

        'defaultController'=>'site',
		        // application components
        'components'=>array(
                'user'=>array(
                        'allowAutoLogin'=>true,
						'stateKeyPrefix'=>'yourfix',
                        'loginUrl' => array('/site/login'),
                ),
				// 'cache' => array (
					// 'class' =>'system.caching.CFileCache'
				// ),
				// 'dbcache' => array (
					// 'class' => 'system.caching.CDbCache'
				// ),
                'authManager'=>array(
                // enable auth user by roles
                        'class'=>'CDbAuthManager',
                        // 'itemTable' => 'm_authitem',//认证项表名称
                        // 'itemChildTable'=> 'm_authitemchild',//认证项父子关系
                        // 'assignmentTable' =>'m_authassignment',//认证项赋权关系
                ),
                'db'=>array(
                        'class'=>'system.db.CDbConnection',
                        'connectionString' => 'mysql:host=10.172.46.240;dbname=esovldata',
                        'emulatePrepare' => true,
                        'username' => 'esovl',
                        'password' => 'Esovl2012',
                        'charset' => 'utf8',
                        'tablePrefix' => '',
                        'schemaCachingDuration'=>3600,
						'enableParamLogging'=>true,
						'enableProfiling'=>true,
                ),
                'errorHandler'=>array(
                // use 'site/error' action to display errors
                        'errorAction'=>'site/error',
                ),
                'log'=>array(
                        'class'=>'CLogRouter',
                        'routes'=>array(
								

								array(
								'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
								'ipFilters'=>array('127.0.0.1','10.172.46.109',"10.172.46.246"),
								),
								/*
                                array(
                                       'class'=>'CProfileLogRoute',
                                ),
								array(
									'class' => 'CFileLogRoute',
									'levels' => 'trace, info, error, warning',
								),
								array(
									'class' => 'CWebLogRoute',
									
								),*/

                        ),
                ),
                'urlManager'=>array(
                        'urlFormat'=>'path',
                        'showScriptName'=>false,
						 // 'urlSuffix' => '.html',//后缀  
                        'rules'=>array(
                        ),
                ),
        ),
        'modules'=>array(
                // "my",
                // "admin",
                'gii'=>array(
                        'class'=>'system.gii.GiiModule',
                        'password'=>'yixiu',
                )
        ),
        'params'=>require(dirname(__FILE__).'/params.php'),
);