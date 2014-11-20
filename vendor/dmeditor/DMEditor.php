<?php 

/**
 * DMEditor class file.
 * @author  Digital Mesh <info@digitalmesh.com>
 * @copyright Copyright &copy; Digital Mesh 2014-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package HelpSystem
 */

namespace yii\helpSystem\dmeditor;

use yii\widgets\InputWidget;
use yii\helpers\Json;
use yii\helpers\Html;
use yii\helpers\Url;
use Yii;
use yii\helpSystem\dmeditor\assets\DMEditorAsset;

class DMEditor extends InputWidget{

	public $options = array();
	
	public function init()
	{
		
		$bundle =  DMEditorAsset::register($this->getView());
		Yii::$app->getModule('helpSystem')->getModule('dmeditor')->_editorAsset = $bundle->baseUrl;	
	    parent::init();
		
	}
	public function run(){

		if($this->hasModel()){
			echo Html::activeTextArea($this->model,$this->attribute,$this->options);
		}else{
			echo Html::textArea($this->name,$this->value,$this->options);
		}
		
		if (!isset($this->options['id'])) {
			$id = $this->hasModel() ? Html::getInputId($this->model, $this->attribute) : $this->getId();
		}else{
			$id = $this->options['id'];
		}
		
		$this->setOptions();
		$options=Json::encode($this->options);
		$this->registerEditorJs($id,$options);
	}

	private function registerEditorJs($id,$options){

		$this->getView()->registerJs(
				
		"$( document ).ready( function() {
		    
			$('#{$id}').ckeditor({$options}); 

		   } );
		");
	}
	
	private function setOptions(){
		$this->options['filebrowserImageBrowseUrl'] = Url::to(["/helpSystem/dmeditor/imagebrowser/browse",
				"Type"=>"Image"]);
		$this->options['filebrowserUploadUrl']= Url::to(["/helpSystem/dmeditor/imageupload/upload"]);
		
	}
}
?>