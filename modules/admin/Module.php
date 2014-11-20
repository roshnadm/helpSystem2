<?php

/**
 * Admin Module class file.
 * @author  Digital Mesh <info@digitalmesh.com>
 * @copyright Copyright &copy; Digital Mesh 2014-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package HelpSystem
 */

namespace yii\helpSystem\admin;

use Yii;
use yii\helpSystem\assets\HelpSystemAsset;
use yii\helpSystem\admin\assets\BootstrapAsset;

class Module extends \yii\base\Module
{
	/**
	 * @property integer $bootstrapVersion
	 * @property string $userRole
	 * @property string $languageCode
	 */
	public $topicPageLimit = 10; //No. of records in one page
	public $maxButtonCount = 5; //No. of pagination buttons

	
	public function init()	
	{   		
		// this method is called when the module is being created
		// you may place code here to customize the module or the application
		$this->controllerNamespace = 'yii\helpSystem\admin\controllers';
		$this->registerAsset();
		
	}
	
	private function registerAsset(){
	 	 HelpSystemAsset::register(Yii::$app->getView());
		 	 Yii::$app->getView()->registerJs(
			"  function disableSubmit(form) {
						$('.saveButton').attr('disabled', 'disabled');
						return true;
					}"
			);
	 	 if (Yii::$app->getModule('helpSystem')->bootstrap == "on"){
	 	 	BootstrapAsset::register(Yii::$app->getView());
	 	 }
	}
	
	public function beforeAction( $action)
	{
		if(parent::beforeAction($action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
