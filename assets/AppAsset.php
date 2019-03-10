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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
             'web/css/bootstrap.min.css',
             'web/css/font-awesome.min.css',
             'web/css/prettyPhoto.css',
             'web/css/price-range.css',
             'web/css/animate.css',
             'web/css/main.css',
             'web/css/responsive.css',
             'web/css/mgf1.css',
             'web/css/magnific-popup.css',
    ];
    public $js = [
            'web/js/jquery.js',
            'web/js/bootstrap.min.js',
            'web/js/jquery.scrollUp.min.js',
            'web/js/price-range.js',
            'web/js/jquery.prettyPhoto.js',
            'web/js/jquery.cookie.js',
            'web/js/jquery.accordion.js',
            'web/js/main.js',

            'web/js/first.js',
            'web/js/scr1.js',
            'web/js/tree.js',
            'web/js/four.js',
            'web/js/exceptions.js',
            'web/js/magnific.previewer.js',
            'web/js/product_image_gallery.js',
            'web/js/cloudzoom.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapPluginAsset',
    ];
}
