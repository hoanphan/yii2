<?php

namespace app\component\widget;
use yii\base\Widget;
/**
 * Created by PhpStorm.
 * User: HOANDHTB
 * Date: 8/10/2016
 * Time: 4:59 PM
 */
class TopNavigation extends Widget
{
    public function run()
    {
       return $this->render('topNavigation');
    }
}