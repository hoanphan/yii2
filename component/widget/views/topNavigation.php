<?php
    use app\assets\AppAsset;
    $bunel = AppAsset::register($this);
?>
<div class="wrapper col0">
    <div id="topline">
        <p>Tel: 0123 456789 | Mail: info@domain.com</p>
        <ul>
            <li><a href="#">Libero</a></li>
            <li><a href="#">Maecenas</a></li>
            <li><a href="#">Mauris</a></li>
            <li class="last"><a href="#">Suspendisse</a></li>
        </ul>
        <br class="clear">
    </div>
</div>
<div class="wrapper">
    <div id="header">
        <div class="fl_left">
            <h1><a href="index.html"><strong>N</strong>ews <strong>M</strong>agazine</a></h1>
            <p>Free Website Template</p>
        </div>
        <div class="fl_right"><a href="#"><img src="<?=$bunel->baseUrl?>/images/demo/468x60.gif" alt=""></a></div>
        <br class="clear">
    </div>
</div>