<?php

namespace app\assets;

use yii\web\AssetBundle;

class ThemeAsset extends AssetBundle
{
 public $sourcePath = '@app/modules/admin/web/';

 public $css = ['css/main.css',];
 public $js = [];
 
 public $depends = [];
}