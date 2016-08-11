<?php
/**
 * Created by PhpStorm.
 * User: HOANDHTB
 * Date: 8/10/2016
 * Time: 5:21 PM
 */

namespace app\component\widget;

use yii\base\Widget;

class MenuSidebar extends Widget
{
    public function run()
    {
       return $this->render('menuSidebar');
    }
}