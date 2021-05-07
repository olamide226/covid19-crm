<?php

namespace app\assets;

use yii\web\AssetBundle;


class dashboardAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/bootstrap.min.css',
        // 'css/font-awesome.min.css',
        // 'css/ionicons.min.css',
        // 'css/AdminLTE.min.css',
        // 'css/morris.css',
        'css/bootstrap-datepicker.min.css',
        // 'css/c3.css',
        'css/main.css',
          'css/style.css',
        // 'css/scrolling-nav.css',
    ];
    public $js = [
      'js/main.js',
      'js/stats.js',
      // 'js/adminlte.min.js',
      // 'js/fastclick.js',
      // 'js/jquery.slimscroll.min.js',
      // 'js/bootstrap-datepicker.min.js',
      // 'js/jquery.knob.min.js',
      // 'js/morris.min.js',
      // 'js/raphael.min.js',
      'js/bootstrap.min.js',
      // 'js/jquery-ui.min.js',
      // 'js/d3.v3.min.js',
      // 'js/c3.min.js',
      'js/loader.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\web\JqueryAsset',
    ];
}
