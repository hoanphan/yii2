<?php
    namespace app\modules\admin\component;
    use yii\base\Widget;

class TopNavigation extends Widget
{
    public function run()
    {
        return $this->render('topNavigation');
    }
}