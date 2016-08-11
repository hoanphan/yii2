<?php
/**
 * Created by PhpStorm.
 * User: HOANDHTB
 * Date: 8/10/2016
 * Time: 5:26 PM
 */

namespace app\component\widget;


use yii\base\Widget;

class Footer extends Widget
{
    public function run()
    {
       return $this->render('footer');
    }
}