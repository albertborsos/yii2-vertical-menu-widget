<?php
/**
 * Created by PhpStorm.
 * User: albertborsos
 * Date: 15. 01. 04.
 * Time: 15:21
 */

namespace albertborsos\yii2widgets;

use albertborsos\yii2lib\helpers\S;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Class VerticalMenu
 * @package albertborsos\yii2widgets
 *
 * [
 *      'items' => [
 *          [
 *              'name' => 'first link name',
 *              'icon' => 'fa fa-shopping-cart',
 *              'url'  => 'link',
 *              'itemOptions' => [
 *                  'class' => 'yourclass',
 *              ],
 *          ],
 *          [
 *              'name' => 'second link name',
 *              'icon' => 'glyphicon glyphicon-arrow-right',
 *              'url'  => ['/link'],
 *          ],
 *          [
 *              'name'  => 'group name',
 *              'icon'  => 'fa fa-list',
 *              'items' => [
 *                  [
 *                      'name' => 'first sublink name'
 *                      'icon' => 'fa fa-list',
 *                      'url'  => ['/link'],
 *                      'itemOptions' => [
 *                          'class' => 'yourclass',
 *                      ],
 *                  ],
 *                  [
 *                      'name' => 'second sublink name'
 *                      'icon' => 'fa fa-list',
 *                      'url'  => ['/link'],
 *                  ],
 *              ],
 *          ]
 *      ]
 * ]
 */
class VerticalMenu extends Widget{

    public $items = [];

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        parent::run();
        $this->registerAssets();

        echo Html::beginTag('div', ['class' => 'verticalMenu']);
        foreach($this->items as $item){
            echo Html::beginTag('div', ['class' => 'accordion-group']);
            $subLinks = ArrayHelper::getValue($item, 'items', []);
            if(count($subLinks) == 0){
                // if its only a link
                echo Html::beginTag('div', ['class' => 'accordion-heading']);
                $itemName    = ArrayHelper::getValue($item, 'name');
                $itemUrl     = ArrayHelper::getValue($item, 'url');
                $itemOptions = ArrayHelper::getValue($item, 'itemOptions', []);
                echo Html::a($itemName, $itemUrl, $itemOptions);
                echo Html::endTag('div'); // end of .accordion-heading
            }else{
                // if this item has sublinks, then need to print this out too
                $accordionOptions = [
                    'class' => 'accordion-toggle',
                    'data' => [
                        'toggle' => 'collapse',
                        'parent' => $this->getId(),
                    ],
                ];

            }
            echo Html::endTag('div'); // end of .accordion-group
        }
        echo Html::endTag('div'); // end of .verticalMenu
    }

    private function registerAssets(){
        $view = $this->getView();
        VerticalMenuAsset::register($view);
    }

    private function renderItem($item){
        $linkName = S::get($item, 0);
        $linkUrl  = S::get($item, 1);
        if(is_null($linkUrl)) $linkUrl = '#';
        echo Html::a($linkName, $linkUrl, ['class' => '']);
    }
}