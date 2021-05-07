<?php

namespace app\assets;

use yii\web\AssetBundle;


class front_pageAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',
        'css/imagehover.min.css',
        'css/style.css',
    ];
    public $js = [
      'js/jquery.easing.min.js',
      'js/custom.js',
      'js/stats.js',
      'js/main.js',
      'js/loader.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\web\JqueryAsset',
    ];
}
