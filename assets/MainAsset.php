<?php

namespace app\assets;

use yii\web\AssetBundle;


class MainAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css_new/font-awesome.min.css',
        'css_new/perfect-scrollbar.min.css',
        'css_new/flag-icon.min.css',
        'css_new/css/style.css',
        'https://use.fontawesome.com/releases/v5.7.0/css/all.css',
    ];
    public $js = [
        'js_new/popper.min.js',
        'js_new/Chart.min.js',
        'js_new/perfect-scrollbar.jquery.min.js',
        'js_new/js/off-canvas.js',
        'js_new/js/hoverable-collapse.js',
        'js_new/js/misc.js',
        'js_new/js/chart.js',
        'js_new/js/maps.js',
        'js_new/bootstrap.min.js',
        'js/stats.js',
        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\web\JqueryAsset',
    ];
}
