<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',

        'css/site.css',
    ];
    public $js = [
//        'js/jquery-2.1.4.min.js',
//        'js/isotope.pkgd.min.js',
//        'js/jquery.flexslider.js',
//        'js/smoothScroll.js',
//        'js/jquery.animsition.min.js',
//        'js/wow.min.js',
//        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
