<?php 

use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="upload-contain">
<div class="dmEditorloader-backdrop"><div class="dmEditorloader">
<img src="<?php echo Yii::$app->getModule('helpSystem')->getModule('dmeditor')->getEditorAsset();?>/img/loading.gif"></div></div>    
     <!-- Content -->     
     <div class="upload-inner">  
     </div>
     <!-- Content closed -->
     <?php echo Html::hiddenInput("imageBrowseUrl",
		Url::to(["/helpSystem/dmeditor/imagebrowser/browseresponse"]),['id'=>'imageBrowseUrl']);?>
</div>