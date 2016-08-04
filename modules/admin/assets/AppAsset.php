<?php
namespace app\modules\admin\assets;

use yii\base\View;
use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $sourcePath = '@app/modules/admin/web/assets';
    public $basePath = '@webroot/modules/admin/web';
    public $baseUrl = '@web/admin/web/';
    public function init()
    {
        parent::init();
        $this->basePath = '@webroot/modules/admin/web';
        $this->css = [
            'css/ace.min.css',
            'css/bootstrap.min.css',
            'font-awesome/4.2.0/css/font-awesome.min.css'
        ];
        $this->js = [
            'js/ace.min.js',
            'js/jquery.min.js'
        ];
        $this->depends = [
            'yii\web\YiiAsset',
            'yii\bootstrap\BootstrapAsset',
        ];
        $this->jsOptions = [
            'position' => View::EVENT_BEGIN_PAGE
        ];
    }

}