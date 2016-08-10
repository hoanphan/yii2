
<link type="text/css" rel="stylesheet" href="http://vietnamnettv.vn/Styles/Widget.css?v=1231">
<style type="text/css"></style>
<link rel="stylesheet" type="text/css" href="http://res.vietnamnet.vn/VietNamNet/Standard/v2015/css/style-vnn-v044.css">
<div style="margin-top: 30px"></div>

<div class="wrapper">
    <div class="container"style="margin-left: 20%">
        <?php
        $simple=\app\models\Simplehtmldom::findOne($id);
        $file=  \navatech\simplehtmldom\SimpleHTMLDom::file_get_html($simple->link);
        $content=$file->find('body',0)->find('div[class=Main-Container]',0)->find('vnn',0)->find('vnn',0)->find('div[class=Main-Body]',0)->find('div[class=HomeBlock clearfix]',0)
        ->find('div');
        $imagers=$content[0]->find('img');
        foreach ($imagers as $imager)
        {
            echo $imager->xmltext();
        }
        echo $content[0];
        ?>
        <br class="clear">
    </div>
</div>
