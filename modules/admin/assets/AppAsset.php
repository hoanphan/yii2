<?php
namespace app\modules\admin\assets;

use yii\base\View;
use yii\bootstrap\BootstrapPluginAsset;
use yii\web\AssetBundle;


class AppAsset extends AssetBundle
{

   /* public $basePath = '@app/modules/admin/web';
    public $baseUrl = '@app/admin/web/';*/
    public function init()
    {
        parent::init();
        $this->sourcePath = "@app/modules/admin/web";
        $this->css = [

//            'css/bootstrap.min.css',
            'font-awesome/4.2.0/css/font-awesome.min.css',
            'fonts/fonts.googleapis.com.css',
            'css/ace.min.css',

        ];
        $this->js = [
            'js/ace-extra.min.js',
           /* 'js/jquery.2.1.1.min.js',*/
//            'js/bootstrap.min.js',
//             'js/jquery-ui.custom.min.js',

            'js/jquery.easypiechart.min.js',
            'js/jquery.sparkline.min.js',
            'js/jquery.flot.min.js',
            'js/jquery.flot.pie.min.js',
            'js/jquery.flot.resize.min.js',


            'js/ace-elements.min.js',
            'js/ace.min.js',

        ];
        $this->depends = [
            'yii\web\YiiAsset',
            'yii\bootstrap\BootstrapAsset',
            'yii\bootstrap\BootstrapPluginAsset'
        ];
        $this->jsOptions['position']=\yii\web\View::POS_HEAD;
    }

    /**
     * @param array $jsOptions
     */


}