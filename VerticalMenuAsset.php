<?php

namespace albertborsos\yii2widgets;

use yii\web\AssetBundle;
use Yii;

class VerticalMenuAsset extends AssetBundle
{
    public $time;
    public $sourcePath = '@vendor/albertborsos/yii2-vertical-menu/assets/';

    public $css;
    public $js;

    public $depends = [
        'yii\web\JqueryAsset',
        '\rmrevin\yii\fontawesome\AssetBundle',
    ];

    public function init()
    {
        parent::init();

        $this->css = [
            //'css/style.css',
            'css/style.css',
        ];

        $this->js = [
            //'js/handler.js',
        ];
    }
} 