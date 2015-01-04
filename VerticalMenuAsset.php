<?php

namespace albertborsos\yii2widgets;

use yii\web\AssetBundle;
use Yii;

class VerticalMenuAsset extends AssetBundle
{
    public $time;
    public $sourcePath = '@vendor/albertborsos/yii2-vertical-menu-widget/assets/';

    public $css;
    public $js;

    public $depends = [
        'yii\web\JqueryAsset',
        '\rmrevin\yii\fontawesome\AssetBundle',
    ];

    public function init()
    {
        parent::init();
        if (YII_DEBUG){
            $this->time = '?'.time();
        }

        $this->css = [
            //'css/style.css'.$this->time,
            'css/style.css'.$this->time,
        ];

        $this->js = [
            //'js/handler.js'.$this->time,
        ];
    }


} 