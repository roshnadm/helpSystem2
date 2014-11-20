HelpSystem 2 module
--------------


Requirements
------------

* Tested with Yii 2
* ckeditor


Quickstart
----------
1.Add the module details in extensions.php 

'yiisoft/helpSystem' =>
	array (
			'name' => 'yiisoft/yii2-helpSystem',
			'version' => '2.0.0.0',
			'alias' =>
			 array (
					'@yii/helpSystem'          => $vendorDir . '/yiisoft/yii2-helpSystem',
					'@yii/helpSystem/admin'    => $vendorDir . '/yiisoft/yii2-helpSystem/modules/admin',
					'@yii/helpSystem/client'   => $vendorDir . '/yiisoft/yii2-helpSystem/modules/client',
					'@yii/helpSystem/dmeditor' => $vendorDir . '/yiisoft/yii2-helpSystem/vendor/dmeditor',
			),
	),

2.Add module to your application config:

~~~php
<?php
    // ...
    'modules'=>[
        // ...
       	'modules'=>[
                    'helpSystem' =>
			['class' => 'yii\helpSystem\Module',
					'modules' => ['admin' => [
							'class'=>'yii\helpSystem\admin\Module',
					],
							'client' =>  'yii\helpSystem\client\Module',
							'dmeditor' => [
									'class'             => 'yii\helpSystem\dmeditor\Module',
									'allowedImageSize'  => 2, // add the maximum upload size in MB. Enter int value.
									'imageUploadPath'   => 'images/EditorImages',// the path to which image uploaded.
									'allowedImageTypes' => ['gif', 'jpeg', 'jpg', 'png']
							]
					],
					'bootstrap' => 'off' // on/off : set 'on' to apply helpSystem bootstrap style
                                                             // set to on when the application is not using bootstrap style,
                                       'userRole'=> ['admin'] ,//Add roles if any. eg ['admin','editor']
				       'pageLayout'=>'//layout/main' // set the page layout path here
			]
	],
    ]
    // ...
~~~

3.Run mysql script:
1. /helpSystem/database/1_DDL/1_helpSystem_base_script.sql
2. /helpSystem/database/4_DML/1_hlp_Language_Insert_script.sql

4. Finally add Help widget to your view template:

~~~php


<?= yii\helpSystem\client\components\HelpWidgetHelpWidget::widget(
			
				[
						'title'=>'CLIENT DEMO', // help link title
						  'header'=>'Survey',
					      'wrapperClass'=>'', // the class added to the wrapper div if any
					      'linkClass'=>'', // class name if we wish to add any
					      'sectionId'=>1,	// section reference mandatory
					      'topicId'=>0, // If you wanted to load a specific topic in help box give its primary key
						  'headerBackGroundColor'=>'#EAE8E9',		
				]
			);
?>
~~~

