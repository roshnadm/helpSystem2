<?php

/**
 * DMEditorAsset class file.
 * @author  Digital Mesh <info@digitalmesh.com>
 * @copyright Copyright &copy; Digital Mesh 2014-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package HelpSystem
 */

namespace yii\helpSystem\dmeditor\assets;

use yii\web\AssetBundle;

class DMEditorAsset extends AssetBundle
{
    public $sourcePath = '@yii/helpSystem/dmeditor/assets';
    public $css = [
    		'/css/upload-style.css',
    ];
    public $js = [
    		'ckeditor/ckeditor.js',
    		'ckeditor/adapters/ckeditor.adapter.jquery.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
