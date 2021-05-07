<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Admin LTE Custom application asset bundle.
 *
 *
 */
 use yii\web\AssetBundle;
 class AdminLtePluginAsset extends AssetBundle
 {
     public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins';
       
     public $js = [
         'datatables/dataTables.bootstrap.min.js',
         'js/main.js';


         // more plugin Js here
     ];
     public $css = [
         'datatables/dataTables.bootstrap.css',
         // more plugin CSS here
     ];
     public $depends = [
         'dmstr\web\AdminLteAsset',
     ];
 }
